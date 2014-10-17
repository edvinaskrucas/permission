<?php namespace Krucas\Permission\Integration\Laravel\Factory;

use Illuminate\Container\Container;
use Krucas\Permission\Factory\ValidatorFactory as BaseValidatorFactory;

class ValidatorFactory extends BaseValidatorFactory
{
    /**
     * Used container instance.
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * @param \Illuminate\Container\Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Return used container instance.
     *
     * @return \Illuminate\Container\Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Instantiate new object of given class.
     *
     * @param string $class Class to instantiate.
     * @return \object
     */
    protected function instantiateClass($class)
    {
        return $this->getContainer()->make($class);
    }
}
