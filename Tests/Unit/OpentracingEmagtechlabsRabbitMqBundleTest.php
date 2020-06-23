<?php

declare(strict_types=1);

namespace Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\Tests\Unit;

use Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\DependencyInjection\AmqplibRabbitMqConsumerCompilerPass;
use Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\DependencyInjection\AmqplibRabbitMqProducerCompilerPass;
use Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\OpentracingEmagtechlabsRabbitMqBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OpentracingEmagtechlabsRabbitMqBundleTest extends TestCase
{
    /** @var OpentracingEmagtechlabsRabbitMqBundle */
    private $subject;

    public function setUp(): void
    {
        $this->subject = new OpentracingEmagtechlabsRabbitMqBundle();
    }

    public function testBuild(): void
    {
        $containerBuilder = $this->prophesize(ContainerBuilder::class);

        $containerBuilder->addCompilerPass(
            new AmqplibRabbitMqProducerCompilerPass(),
            'beforeOptimization',
            -999
        )->shouldBeCalled();

        $containerBuilder->addCompilerPass(
            new AmqplibRabbitMqConsumerCompilerPass(),
            'beforeOptimization',
            -999
        )->shouldBeCalled();

        $this->subject->build($containerBuilder->reveal());
    }
}
