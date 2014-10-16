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

        $validator = m::mock('Krucas\Permission\ValidatorInterface');
        $validator->shouldReceive('validate')->once()->with($params)->andReturn(true);

        $resolver = m::mock('Krucas\Permission\ValidatorResolverInterface');
        $resolver->shouldReceive('resolve')->once()->with('user.edit')->andReturn($validator);

        $manager = new Manager($resolver);
        $this->assertTrue($manager->can('user.edit', $params));
    }
}
