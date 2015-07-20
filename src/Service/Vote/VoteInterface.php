<?php
namespace Werkint\Bundle\VoterBundle\Service\Vote;

use Werkint\Bundle\VoterBundle\Service\Action\ActionInterface;

/**
 * Голос за заявку
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
interface VoteInterface
{
    /**
     * @return ActionInterface
     */
    public function getAction();

    /**
     * @param ActionInterface $action
     * @return $this
     */
    public function setAction(ActionInterface $action);
}