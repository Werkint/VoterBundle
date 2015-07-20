<?php
namespace Werkint\Bundle\VoterBundle\Service\Exception;

/**
 * Кидается в случае противоречивых ответов
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class NonMergeableVoteException extends VoterConflictException
{
}