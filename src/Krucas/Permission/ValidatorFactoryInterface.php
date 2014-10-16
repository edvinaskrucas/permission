<?php namespace Krucas\Permission;

interface ValidatorFactoryInterface
{
    /**
     * Create validator from given class.
     *
     * @param string $class Class name to create.
     * @return \Krucas\Permission\ValidatorInterface
     */
    public function make($class);
}
