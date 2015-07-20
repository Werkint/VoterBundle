<?php
namespace Werkint\Bundle\VoterBundle\Service\Vote;

/**
 * Возвращается, если объект воздержался от голосования
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class AbstainVote extends AbstractVote implements
    MergeableVoteInterface
{
    /**
     * @inheritdoc
     */
    public function merge(VoteInterface $vote)
    {
        return $vote;
    }
}