<?php
namespace Werkint\Bundle\VoterBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Werkint\Bundle\VoterBundle\DependencyInjection\Compiler\VoterPass;

/**
 * WerkintVoterBundle.
 */
class WerkintVoterBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new VoterPass());
    }
}
