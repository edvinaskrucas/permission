<?php namespace Krucas\Permissions\Tests;

use Krucas\Permissions\Manager;
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

        $validator = m::mock('Krucas\Permissions\ValidatorInterface');
        $validator->shouldReceive('validate')->once()->with($params)->andReturn(true);

        $resolver = m::mock('Krucas\Permissions\ValidatorResolverInterface');
        $resolver->shouldReceive('resolve')->once()->with('user.edit')->andReturn($validator);

        $manager = new Manager($resolver);
        $this->assertTrue($manager->can('user.edit', $params));
    }
}
