<?php

declare(strict_types=1);

namespace Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\Tests\Unit\DependencyInjection;

use Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\Consumer\Consumer;
use Auxmoney\OpentracingEmagtechlabsRabbitMqBundle\DependencyInjection\AmqplibRabbitMqConsumerCompilerPass;
use PHPUnit\Framework\TestCase;
use stdClass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class AmqplibRabbitMqConsumerCompilerPassTest extends TestCase
{
    /** @var AmqplibRabbitMqConsumerCompilerPass */
    private $subject;

    public function setUp(): void
    {
        $this->subject = new AmqplibRabbitMqConsumerCompilerPass();
    }

    public function testProcessWithConsumerClassSubstitution(): void
    {
        $nonConsumerDefinition = new Definition(stdClass::class);
        $nonConsumerDefinition->setTags(['someTag' => [], 'someOtherTag' => []]);

        $consumerDefinition = new Definition(stdClass::class);
        $consumerDefinition->setTags(['someTag' => [], 'old_sound_rabbit_mq.consumer' => []]);

        $containerBuilder = $this->prophesize(ContainerBuilder::class);
        $containerBuilder
            ->getDefinitions()
            ->shouldBeCalledTimes(1)
            ->willReturn([$nonConsumerDefinition, $consumerDefinition]);

        $this->subject->process($containerBuilder->reveal());

        self::assertEquals(stdClass::class, $nonConsumerDefinition->getClass());
        self::assertEquals(Consumer::class, $consumerDefinition->getClass());
    }
}
