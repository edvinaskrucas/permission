<?php namespace Krucas\Permissions;

interface ValidatorFactoryInterface
{
    /**
     * Create validator from given class.
     *
     * @param string $class Class name to create.
     * @return \Krucas\Permissions\ValidatorInterface
     */
    public function make($class);
}
