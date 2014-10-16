<?php namespace Krucas\Permission;

interface ValidatorResolverInterface
{
    /**
     * Resolve permission validator.
     *
     * @param string $permission Permission name.
     * @return \Krucas\Permission\ValidatorInterface
     */
    public function resolve($permission);
}
