<?php
namespace Werkint\Bundle\VoterBundle\Service;

/**
 * Содержит список голосующих объектов
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class VoterStorage
{
    public function __construct()
    {
        $this->voters = [];
    }

    /**
     * @var array|Voter\VoterInterface[]
     */
    protected $voters;

    /**
     * @param Voter\VoterInterface $voter
     */
    public function addVoter(Voter\VoterInterface $voter)
    {
        $this->voters[] = $voter;
    }

    /**
     * @return array|Voter\VoterInterface[]
     */
    public function getVoters()
    {
        return $this->voters;
    }
}