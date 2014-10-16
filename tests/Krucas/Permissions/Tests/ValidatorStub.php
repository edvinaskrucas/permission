<?php namespace Krucas\Permissions\Tests;

use Krucas\Permissions\ValidatorInterface;

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
