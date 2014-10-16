<?php namespace Krucas\Permissions\Tests;

use Krucas\Permissions\ValidatorFactory;
use Krucas\Permissions\ValidatorInterface;
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
    public function testMakeShouldThrowExceptionOnEmptyPermission()
    {
        $factory = new ValidatorFactory();
        $factory->make('');
    }

    public function testMakeShouldReturnValidatorObject()
    {
        $factory = new ValidatorFactory();
        $this->assertTrue($factory->make('User\Edit') instanceof ValidatorInterface);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testResolveShouldThrowExceptionOnNonValidatorInterface()
    {
        $factory = new ValidatorFactory();
        $factory->make('User\Delete');
    }
}
