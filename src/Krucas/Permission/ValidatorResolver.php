<?php namespace Krucas\Permission;

use Krucas\Permission\Factory\ValidatorFactoryInterface;

class ValidatorResolver implements ValidatorResolverInterface
{
    /**
     * Used factory implementation.
     *
     * @var \Krucas\Permission\Factory\ValidatorFactoryInterface
     */
    protected $validatorFactory;

    /**
     * Registered namespaces.
     *
     * @var \SplPriorityQueue
     */
    protected $namespaces;

    /**
     * @param \Krucas\Permission\Factory\ValidatorFactoryInterface $validatorFactory Factory implementation.
     */
    public function __construct(ValidatorFactoryInterface $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory;
        $this->namespaces = new \SplPriorityQueue();
    }

    /**
     * Return used factory implementation.
     *
     * @return \Krucas\Permission\Factory\ValidatorFactoryInterface
     */
    public function getValidatorFactory()
    {
        return $this->validatorFactory;
    }

    /**
     * Register given namespace with a priority.
     *
     * @param string $namespace Namespace to register.
     * @param null|int $priority Namespace priority.
     * @return void
     */
    public function registerNamespace($namespace, $priority = null)
    {
        $this->namespaces->insert($namespace, $priority);
    }

    /**
     * Return queue with namespaces.
     *
     * @return \SplPriorityQueue
     */
    public function getNamespaces()
    {
        return $this->namespaces;
    }

    /**
     * Resolve permission validator.
     *
     * @param string $permission Permission name.
     * @return \Krucas\Permission\ValidatorInterface
     */
    public function resolve($permission)
    {
        if (strlen($permission) <= 0) {
            throw new \InvalidArgumentException('Failed to resolve validator for empty permission!');
        }

        $className = $this->prepareClassName($permission);

        return $this->getValidatorFactory()->make($className);
    }

    /**
     * Prepare validator class name.
     *
     * @param string $permission Permission name.
     * @return string
     */
    protected function prepareClassName($permission)
    {
        $exploded = explode('.', $permission);

        $class = implode('\\', array_map('ucfirst', $exploded));

        return $this->appendNamespace($class, $this->getNamespaces());
    }

    /**
     * Append namespace for a class name.
     *
     * @param string $class Class name to append namespace for.
     * @param \SplPriorityQueue $namespaces Registered namespaces.
     * @return string
     */
    protected function appendNamespace($class, \SplPriorityQueue $namespaces)
    {
        foreach (clone $namespaces as $namespace) {
            $namespaced = implode('\\', array($namespace, $class));

            if (class_exists($namespaced)) {
                return '\\' . $namespaced;
            }
        }

        return '\\' . $class;
    }
}
