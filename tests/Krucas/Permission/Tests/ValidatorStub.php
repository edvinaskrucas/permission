<?php namespace Krucas\Permission\Tests;

use Krucas\Permission\Validator\ValidatorInterface;

class ValidatorStub implements ValidatorInterface
{
    /**
     * Validate permission with given params.
     *
     * @param mixed $params Params to check with.
     * @return bool
     */
    public function validate($params = null)
    {
        // TODO: Implement validate() method.
    }
}
