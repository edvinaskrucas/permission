<?php namespace Krucas\Permission\Tests;

use Krucas\Permission\Manager;
use Mockery as m;

class ManagerTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        m::close();
    }

    public function testCanShouldCallValidateWithParams()
    {
        $params = array('obj' => new \stdClass());

        $validator = m::mock('Krucas\Permission\Validator\ValidatorInterface');
        $validator->shouldReceive('validate')->once()->with($params)->andReturn(true);

        $driver = m::mock('Krucas\Permission\Driver\DriverInterface');
        $driver->shouldReceive('getValidator')->once()->with('user.edit')->andReturn($validator);

        $manager = new Manager($driver);
        $this->assertTrue($manager->can('user.edit', $params));
    }
}
