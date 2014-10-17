<?php namespace Krucas\Permission\Tests;

use Krucas\Permission\ValidatorResolver;
use Mockery as m;

class ValidatorResolverTest extends \PHPUnit_Framework_TestCase
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

        $resolver = new ValidatorResolver($factory);
        $resolver->resolve('');
    }

    public function testResolveShouldReturnValidatorObject()
    {
        $validator = m::mock('Krucas\Permission\ValidatorInterface');

        $factory = m::mock('Krucas\Permission\Factory\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->once()->with('\User\Edit')->andReturn($validator);

        $resolver = new ValidatorResolver($factory);
        $this->assertEquals($validator, $resolver->resolve('user.edit'));
    }

    public function testResolveShouldPrependNamespace()
    {
        $factory = m::mock('Krucas\Permission\Factory\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->once()->with('\Namespace\User\Edit');

        $resolver = new ValidatorResolver($factory);
        $resolver->registerNamespace('Namespace');
        $resolver->resolve('user.edit');
    }

    public function testResolveShouldPrependNamespaceWithHigherPriority()
    {
        $factory = m::mock('Krucas\Permission\Factory\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->once()->with('\Namespace\Higher\User\Edit');

        $resolver = new ValidatorResolver($factory);
        $resolver->registerNamespace('Namespace', 0);
        $resolver->registerNamespace('Namespace\Higher', 1);
        $resolver->resolve('user.edit');
    }
}
