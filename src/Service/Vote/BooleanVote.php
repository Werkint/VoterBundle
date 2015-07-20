<?php
namespace Werkint\Bundle\VoterBundle\Service\Vote;

use Werkint\Bundle\VoterBundle\Service\Action\SimpleAction;

/**
 * Простой ответ - да/нет
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class BooleanVote extends AbstractVote implements
    MergeableVoteInterface,
    PostVotedAwareInterface
{
    protected $result;

    /**
     * @param boolean|null $result
     */
    public function __construct($result)
    {
        $this->result = $result === null ? null : (bool)$result;
    }

    /**
     * @return boolean
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @inheritdoc
     */
    public function merge(VoteInterface $vote)
    {
        if (!$this->action instanceof SimpleAction) {
            return null;
        }

        $strategy = $this->action->getDecisionStrategy();

        if ($vote instanceof AbstainVote) {
            $this->result = $strategy !== SimpleAction::STRATEGY_CONSENSUS;
            return $this;
        }

        if (!$vote instanceof BooleanVote) {
            return null;
        }

        if ($this->getResult() === null) {
            $this->result = $vote->getResult();
        }

        switch ($strategy) {
            case SimpleAction::STRATEGY_AFFIRMATIVE:
                $this->result = $this->getResult() || $vote->getResult();
                return $this;

            case SimpleAction::STRATEGY_UNANIMOUS:
            case SimpleAction::STRATEGY_CONSENSUS:
                $this->result = $this->getResult() && $vote->getResult();
                return $this;
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function onPostVoted()
    {
        if ($this->getResult() === null) {
            if (!$this->action instanceof SimpleAction) {
                return false;
            }

            $strategy = $this->action->getDecisionStrategy();
            $this->result = $strategy === SimpleAction::STRATEGY_UNANIMOUS;
        }
    }
}