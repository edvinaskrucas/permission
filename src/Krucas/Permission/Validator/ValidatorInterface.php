<?php namespace Krucas\Permission\Validator;

interface ValidatorInterface
{
    /**
     * Validate permission with given params.
     *
     * @param mixed $params Params to check with.
     * @return bool
     */
    public function validate($params = null);
}
