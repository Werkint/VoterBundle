<?php
namespace Werkint\Bundle\VoterBundle\Service\Vote;

use Werkint\Bundle\VoterBundle\Service\Action\ActionInterface;

/**
 * Базовый класс голосов
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
abstract class AbstractVote implements
    VoteInterface
{
    /**
     * @var ActionInterface
     */
    protected $action;

    /**
     * @inheritdoc
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @inheritdoc
     */
    public function setAction(ActionInterface $action)
    {
        $this->action = $action;
        return $this;
    }
}