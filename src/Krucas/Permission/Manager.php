<?php namespace Krucas\Permission;

use Krucas\Permission\Driver\DriverInterface;

class Manager
{
    /**
     * Driver instance.
     *
     * @var \Krucas\Permission\Driver\DriverInterface
     */
    protected $driver;

    /**
     * @param \Krucas\Permission\Driver\DriverInterface $driver Driver instance.
     */
    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Return used driver.
     *
     * @return \Krucas\Permission\Driver\DriverInterface
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Check permission status.
     *
     * @param string $permission To check.
     * @param mixed $params Permission check params.
     * @return bool
     */
    public function can($permission, $params = null)
    {
        return $this->getValidator($permission)->validate($params);
    }

    /**
     * Resolve permission validator.
     *
     * @param string $permission Permission name.
     * @return \Krucas\Permission\Validator\ValidatorInterface
     */
    public function getValidator($permission)
    {
        return $this->getDriver()->getValidator($permission);
    }
}
