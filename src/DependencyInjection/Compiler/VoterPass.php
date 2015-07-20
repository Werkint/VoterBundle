<?php
namespace Werkint\Bundle\VoterBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Werkint\Bundle\VoterBundle\Service\Voter\VoterInterface;

/**
 * Собирает все @see VoterInterface
 *
 * @author Bogdan Yurov <bogdan@yurov.me>
 */
class VoterPass implements
    CompilerPassInterface
{
    const STORAGE_SERVICE = 'werkint_voter.voterstorage';
    const VOTER_TAG = 'werkint_voter.voter';


    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition(static::STORAGE_SERVICE)) {
            return;
        }
        $definition = $container->getDefinition(
            static::STORAGE_SERVICE
        );

        $list = $container->findTaggedServiceIds(static::VOTER_TAG);
        foreach ($list as $id => $attributes) {
            $definition->addMethodCall(
                'addVoter', [
                    new Reference($id),
                ]
            );
        }
    }
}
