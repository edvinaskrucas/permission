<?php namespace Krucas\Permission\Integration\Laravel;

use Illuminate\Support\ServiceProvider;
use Krucas\Permission\Manager;
use Krucas\Permission\ValidatorResolver;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('edvinaskrucas/permission');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['config']->package('edvinaskrucas/permission', __DIR__.'/../../../../config');

        $this->app['permission'] = $this->app->share(
            function ($app) {
                $factory = new ValidatorFactory();
                $factory->setContainer($app);

                $resolver = new ValidatorResolver($factory);

                $namespaces = $app['config']->get('permission::namespaces');

                if (count($namespaces) > 0) {
                    foreach ($namespaces as $namespace => $priority) {
                        $resolver->registerNamespace($namespace, $priority);
                    }
                }

                $manager = new Manager($resolver);

                return $manager;
            }
        );
    }
}
