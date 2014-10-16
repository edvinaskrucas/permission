<?php namespace Krucas\Permissions\Tests;

use Krucas\Permissions\ValidatorResolver;
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
        $factory = m::mock('Krucas\Permissions\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->never();

        $resolver = new ValidatorResolver($factory);
        $resolver->resolve('');
    }

    public function testResolveShouldReturnValidatorObject()
    {
        $validator = m::mock('Krucas\Permissions\ValidatorInterface');

        $factory = m::mock('Krucas\Permissions\ValidatorFactoryInterface');
        $factory->shouldReceive('make')->once()->with('User\Edit')->andReturn($validator);

        $resolver = new ValidatorResolver($factory);
        $this->assertEquals($validator, $resolver->resolve('user.edit'));
    }
}
