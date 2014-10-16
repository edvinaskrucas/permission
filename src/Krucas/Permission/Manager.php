<?php namespace Krucas\Permission;

class Manager
{
    /**
     * Validator resolver instance.
     *
     * @var \Krucas\Permission\ValidatorResolverInterface
     */
    protected $validatorResolver;

    /**
     * @param \Krucas\Permission\ValidatorResolverInterface $validatorResolver Validator resolver instance.
     */
    public function __construct(ValidatorResolverInterface $validatorResolver)
    {
        $this->validatorResolver = $validatorResolver;
    }

    /**
     * Return used validator resolver.
     *
     * @return \Krucas\Permission\ValidatorResolverInterface
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
     * @return \Krucas\Permission\ValidatorInterface
     */
    public function getValidator($permission)
    {
        return $this->getValidatorResolver()->resolve($permission);
    }
}
