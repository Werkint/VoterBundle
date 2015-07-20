<?php
namespace Werkint\Bundle\VoterBundle\Service;

/**
 * Проводит голосование между участниками.
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
interface PollerInterface
{
    /**
     * @param Action\ActionInterface $action
     * @return Vote\VoteInterface
     * @throws Exception\VoterConflictException Конфликт голосов
     * @throws Exception\WrongVoteResultException Неправильный ответ voter
     */
    public function process(Action\ActionInterface $action);
}