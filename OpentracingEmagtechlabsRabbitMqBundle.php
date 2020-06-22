<?php

declare(strict_types=1);

namespace Auxmoney\OpentracingEmagtechlabsRabbitMqBundle;

use Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\DependencyInjection\AmqplibRabbitMqConsumerCompilerPass;
use Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\DependencyInjection\AmqplibRabbitMqProducerCompilerPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class OpentracingEmagtechlabsRabbitMqBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(
            new AmqplibRabbitMqProducerCompilerPass(),
            PassConfig::TYPE_BEFORE_OPTIMIZATION,
            -999
        );
        $container->addCompilerPass(
            new AmqplibRabbitMqConsumerCompilerPass(),
            PassConfig::TYPE_BEFORE_OPTIMIZATION,
            -999
        );
    }
}
