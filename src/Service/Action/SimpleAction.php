<?php
namespace Werkint\Bundle\VoterBundle\Service\Action;

use Werkint\Bundle\VoterBundle\Service\Vote\BooleanVote;

/**
 * Действие, которое в качестве ответа от voter'ов
 * предполагает только @see BooleanVote
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class SimpleAction extends AbstractAction
{
    /**
     * TRUE, если хоть один voter вернул TRUE
     */
    const STRATEGY_AFFIRMATIVE = 'affirmative';
    /**
     * TRUE, если все voter'ы вернули TRUE
     */
    const STRATEGY_CONSENSUS = 'consensus';
    /**
     * TRUE, если ни один voter не вернул FALSE
     */
    const STRATEGY_UNANIMOUS = 'unanimous';

    protected $decisionStrategy;

    /**
     * @param string $decisionStrategy
     */
    public function __construct(
        $decisionStrategy = self::STRATEGY_UNANIMOUS
    ) {
        $this->decisionStrategy = $decisionStrategy;
    }

    /**
     * @return string
     */
    public function getDecisionStrategy()
    {
        return $this->decisionStrategy;
    }
}