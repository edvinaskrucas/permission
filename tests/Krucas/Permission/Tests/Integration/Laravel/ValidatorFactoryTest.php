<?php namespace Krucas\Permission\Tests\Integration\Laravel;

use Krucas\Permission\Integration\Laravel\ValidatorFactory;
use Mockery as m;

class ValidatorFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        m::close();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testResolveShouldCallMakeOnContainer()
    {
        $container = m::mock('Illuminate\Container\Container');
        $container->shouldReceive('make')->once()->with('User\Delete');

        $factory = new ValidatorFactory();
        $factory->setContainer($container);
        $factory->make('User\Delete');
    }
}
