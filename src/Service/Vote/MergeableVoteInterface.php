<?php
namespace Werkint\Bundle\VoterBundle\Service\Vote;

/**
 * Голос, который можно объединять
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
interface MergeableVoteInterface extends VoteInterface
{
    /**
     * @param VoteInterface $vote
     * @return VoteInterface|null
     */
    public function merge(VoteInterface $vote);
}