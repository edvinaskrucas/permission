<?php namespace Krucas\Permissions;

interface ValidatorResolverInterface
{
    /**
     * Resolve permission validator.
     *
     * @param string $permission Permission name.
     * @return \Krucas\Permissions\ValidatorInterface
     */
    public function resolve($permission);
}
