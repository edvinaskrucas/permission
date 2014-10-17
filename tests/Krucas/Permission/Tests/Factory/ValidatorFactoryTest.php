<?php namespace Krucas\Permission\Tests\Factory;

use Krucas\Permission\Factory\ValidatorFactory;
use Krucas\Permission\Validator\ValidatorInterface;
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
