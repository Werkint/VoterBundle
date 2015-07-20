<?php
namespace Werkint\Bundle\VoterBundle\Service\Voter;

/**
 * Класс, который определяет применяемое действие
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
interface VoterInterface
{
    public function supports(ActionInterface $action);

    public function vote(ActionInterface $action);
}