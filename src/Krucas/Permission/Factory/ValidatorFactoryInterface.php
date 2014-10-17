<?php namespace Krucas\Permission\Factory;

interface ValidatorFactoryInterface
{
    /**
     * Create validator from given class.
     *
     * @param string $class Class name to create.
     * @return \Krucas\Permission\Validator\ValidatorInterface
     */
    public function make($class);
}
