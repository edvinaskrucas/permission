<?php namespace Krucas\Permissions;

interface ValidatorInterface
{
    /**
     * Validate permission with given params.
     *
     * @param array $params Params to check with.
     * @return bool
     */
    public function validate(array $params = array());
}
