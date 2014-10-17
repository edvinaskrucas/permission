<?php namespace Krucas\Permission\Driver;

interface DriverInterface
{
    /**
     * Return validator for given permission.
     *
     * @param string $permission Permission name to get validator for.
     * @return \Krucas\Permission\ValidatorInterface
     */
    public function getValidator($permission);
}
