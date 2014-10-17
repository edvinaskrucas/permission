<?php namespace Krucas\Permission\Factory;

use Krucas\Permission\ValidatorInterface;

class ValidatorFactory implements ValidatorFactoryInterface
{
    /**
     * Create validator from given class.
     *
     * @param string $class Class name to create.
     * @return \Krucas\Permission\ValidatorInterface
     */
    public function make($class)
    {
        if (strlen($class) <= 0) {
            throw new \InvalidArgumentException('Failed to resolve validator for empty class!');
        }

        $validator = $this->instantiateClass($class);

        if ($validator instanceof ValidatorInterface) {
            return $validator;
        }

        throw new \InvalidArgumentException('Resolved class [' . get_class($validator) . '] is not validator!');
    }

    /**
     * Instantiate new object of given class.
     *
     * @param string $class Class to instantiate.
     * @return \object
     */
    protected function instantiateClass($class)
    {
        return new $class();
    }
}
