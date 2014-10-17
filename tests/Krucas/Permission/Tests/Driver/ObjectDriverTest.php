<?php namespace Krucas\Permission\Tests\Driver;

use Krucas\Permission\Driver\ObjectDriver;
use Mockery as m;

class ObjectDriverTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        m::close();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testResolveShouldThrowExceptionOnEmptyPermission()
    {
        $factory = m::mock('Krucas\Permission\Factory\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->never();

        $resolver = new ObjectDriver($factory);
        $resolver->getValidator('');
    }

    public function testResolveShouldReturnValidatorObject()
    {
        $validator = m::mock('Krucas\Permission\ValidatorInterface');

        $factory = m::mock('Krucas\Permission\Factory\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->once()->with('\User\Edit')->andReturn($validator);

        $resolver = new ObjectDriver($factory);
        $this->assertEquals($validator, $resolver->getValidator('user.edit'));
    }

    public function testResolveShouldPrependNamespace()
    {
        $factory = m::mock('Krucas\Permission\Factory\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->once()->with('\Namespace\User\Edit');

        $resolver = new ObjectDriver($factory);
        $resolver->registerNamespace('Namespace');
        $resolver->getValidator('user.edit');
    }

    public function testResolveShouldPrependNamespaceWithHigherPriority()
    {
        $factory = m::mock('Krucas\Permission\Factory\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->once()->with('\Namespace\Higher\User\Edit');

        $resolver = new ObjectDriver($factory);
        $resolver->registerNamespace('Namespace', 0);
        $resolver->registerNamespace('Namespace\Higher', 1);
        $resolver->getValidator('user.edit');
    }
}
