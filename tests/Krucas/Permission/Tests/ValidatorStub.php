<?php namespace Krucas\Permission\Tests;

use Krucas\Permission\ValidatorInterface;

class ValidatorStub implements ValidatorInterface
{
    /**
     * Validate permission with given params.
     *
     * @param array $params Params to check with.
     * @return bool
     */
    public function validate(array $params = array())
    {
        // TODO: Implement validate() method.
    }
}
