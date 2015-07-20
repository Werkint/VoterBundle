<?php
namespace Werkint\Bundle\VoterBundle\Service\Voter;

/**
 * Базовый класс voter'а
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
abstract class AbstractVoter implements
    VoterInterface
{
    protected function wrongAction()
    {
        throw new \Exception('Wrong action');
    }
}