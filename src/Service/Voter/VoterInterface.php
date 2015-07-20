<?php
namespace Werkint\Bundle\VoterBundle\Service\Voter;

use Werkint\Bundle\VoterBundle\Service\Action\ActionInterface;
use Werkint\Bundle\VoterBundle\Service\Vote\VoteInterface;

/**
 * Класс, который определяет применяемое действие
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
interface VoterInterface
{
    /**
     * Проверяет, можем ли мы обработать $action
     *
     * @param ActionInterface $action
     * @return bool
     */
    public function supports(ActionInterface $action);

    /**
     * Возвращает действие для проведения
     *
     * @param ActionInterface $action
     * @return null|VoteInterface
     */
    public function vote(ActionInterface $action);
}