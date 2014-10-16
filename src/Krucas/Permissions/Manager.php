<?php namespace Krucas\Permissions;

class Manager
{
    /**
     * Validator resolver instance.
     *
     * @var \Krucas\Permissions\ValidatorResolverInterface
     */
    protected $validatorResolver;

    /**
     * @param \Krucas\Permissions\ValidatorResolverInterface $validatorResolver Validator resolver instance.
     */
    public function __construct(ValidatorResolverInterface $validatorResolver)
    {
        $this->validatorResolver = $validatorResolver;
    }

    /**
     * Return used validator resolver.
     *
     * @return \Krucas\Permissions\ValidatorResolverInterface
     */
    public function getValidatorResolver()
    {
        return $this->validatorResolver;
    }

    /**
     * Check permission status.
     *
     * @param string $permission To check.
     * @param array $params Permission check params.
     * @return bool
     */
    public function can($permission, array $params = array())
    {
        return $this->getValidator($permission)->validate($params);
    }

    /**
     * Resolve permission validator.
     *
     * @param string $permission Permission name.
     * @return \Krucas\Permissions\ValidatorInterface
     */
    public function getValidator($permission)
    {
        return $this->getValidatorResolver()->resolve($permission);
    }
}
