<?php namespace Krucas\Permissions;

class ValidatorFactory implements ValidatorFactoryInterface
{
    /**
     * Create validator from given class.
     *
     * @param string $class Class name to create.
     * @return \Krucas\Permissions\ValidatorInterface
     */
    public function make($class)
    {
        if (strlen($class) <= 0) {
            throw new \InvalidArgumentException('Failed to resolve validator for empty class!');
        }

        $validator = new $class();

        if ($validator instanceof ValidatorInterface) {
            return $validator;
        }

        throw new \InvalidArgumentException('Resolved class [' . get_class($validator) . '] is not validator!');
    }
}
