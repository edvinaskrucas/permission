<?php namespace Krucas\Permissions\Tests;

use Krucas\Permissions\ValidatorInterface;
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
     * expectedException \InvalidArgumentException
     */
    public function testResolveShouldThrowExceptionOnEmptyPermission()
    {
//        $resolver = new ValidatorResolver();
//        $resolver->resolve('');
    }

    public function testResolveShouldReturnValidatorObject()
    {
//        class_alias('Krucas\Permissions\Tests\ValidatorStub', 'User\Edit');
//
//        $resolver = new ValidatorResolver();
//        $this->assertTrue($resolver->resolve('user.edit') instanceof ValidatorInterface);
    }

    /**
     * expectedException \InvalidArgumentException
     */
    public function testResolveShouldThrowExceptionOnNonValidatorInterface()
    {
//        class_alias('Krucas\Permissions\Tests\NonValidatorStub', 'User\Delete');
//
//        $resolver = new ValidatorResolver();
//        $resolver->resolve('user.delete');
    }
}
