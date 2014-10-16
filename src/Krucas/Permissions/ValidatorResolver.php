<?php namespace Krucas\Permissions;

class ValidatorResolver implements ValidatorResolverInterface
{
    /**
     * Used factory implementation.
     *
     * @var \Krucas\Permissions\ValidatorFactoryInterface
     */
    protected $validatorFactory;

    /**
     * @param \Krucas\Permissions\ValidatorFactoryInterface $validatorFactory Factory implementation.
     */
    public function __construct(ValidatorFactoryInterface $validatorFactory)
    {
        $this->validatorFactory = $validatorFactory;
    }

    /**
     * Return used factory implementation.
     *
     * @return \Krucas\Permissions\ValidatorFactoryInterface
     */
    public function getValidatorFactory()
    {
        return $this->validatorFactory;
    }

    /**
     * Resolve permission validator.
     *
     * @param string $permission Permission name.
     * @return \Krucas\Permissions\ValidatorInterface
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

        return implode('\\', array_map('ucfirst', $exploded));
    }
}
