<?php
namespace Werkint\Bundle\VoterBundle\Service\Exception;

/**
 * Кидается в случае неправильного ответа из @see VoterInterface::vote
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class WrongVoteResultException extends \Exception
{
}