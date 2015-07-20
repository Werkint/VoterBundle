<?php
namespace Werkint\Bundle\VoterBundle\Service;

/**
 * @see    PollerInterface
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class Poller implements
    PollerInterface
{
    protected $voterStorage;

    public function __construct(
        VoterStorage $voterStorage
    ) {
        $this->voterStorage = $voterStorage;
    }

    /**
     * @inheritdoc
     */
    public function process(Action\ActionInterface $action)
    {
        $votes = [];
        foreach ($this->voterStorage->getVoters() as $voter) {
            if (!$voter->supports($action)) {
                continue;
            }

            $vote = $voter->vote($action);
            if ($vote === null) {
                $vote = new Vote\AbstainVote();
            }

            $this->assertVoteCorrect($vote);

            $vote->setAction($action);
            $votes[] = $vote;
        }

        $result = $this->reduce($votes);

        if ($result instanceof Vote\PostVotedAwareInterface) {
            if ($result->onPostVoted() === false) {
                throw new Exception\WrongVoteResultException('onPostVoted returned false');
            }
        }

        return $result;
    }

    /**
     * @param array|Vote\VoteInterface[] $votes
     * @return Vote\VoteInterface
     * @throws Exception\NonMergeableVoteException
     * @throws Exception\VoterConflictException
     */
    protected function reduce(array $votes)
    {
        $result = null;
        /** @var Vote\VoteInterface $vote */

        foreach ($votes as $vote) {
            if ($result) {
                if (!$result instanceof Vote\MergeableVoteInterface) {
                    throw new Exception\NonMergeableVoteException('Non-mergeable vote');
                }

                $result = $result->merge($vote);

                if (!$result instanceof Vote\VoteInterface) {
                    throw new Exception\VoterConflictException(sprintf(
                        'Wrong merge result: %s %s',
                        gettype($result),
                        is_object($result) ? get_class($result) : ''
                    ));
                }
            } else {
                $result = $vote;
            }
        }

        if (!$result) {
            return new Vote\AbstainVote();
        }

        return $result;
    }

    /**
     * @param mixed $vote
     * @throws Exception\WrongVoteResultException
     */
    protected function assertVoteCorrect($vote)
    {
        if (!$vote instanceof Vote\VoteInterface) {
            throw new Exception\WrongVoteResultException(sprintf(
                'Wrong vote result: %s %s',
                gettype($vote),
                is_object($vote) ? get_class($vote) : ''
            ));
        }
    }
}