<?php
namespace Werkint\Bundle\VoterBundle\Service\Voter;

use Werkint\Bundle\VoterBundle\Service\Action\ActionInterface;
use Werkint\Bundle\VoterBundle\Service\Action\SimpleAction;
use Werkint\Bundle\VoterBundle\Service\Vote\BooleanVote;


/**
 * Voter, который для класса @see SimpleAction создает
 * ответ по-умолчанию, чтобы не вернулся Abstain
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class SimpleActionDefaultVoter extends AbstractVoter
{
    /**
     * @inheritdoc
     */
    public function supports(ActionInterface $action)
    {
        return $action instanceof SimpleAction;
    }

    /**
     * @inheritdoc
     */
    public function vote(ActionInterface $action)
    {
        return new BooleanVote(null);
    }
}