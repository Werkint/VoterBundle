<?php
namespace Werkint\Bundle\VoterBundle\Service\Vote;

use Werkint\Bundle\VoterBundle\Service\Exception\WrongVoteResultException;

/**
 * Интерфейс для результатов, которым нужна дополнительная обработка в конце голосования
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
interface PostVotedAwareInterface
{
    /**
     * При возврате false кидается исключение @see WrongVoteResultException
     *
     * @return null|bool
     */
    public function onPostVoted();
}