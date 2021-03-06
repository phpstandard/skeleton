<?php

namespace Bootstrappers;

use Dotenv\Dotenv;
use Framework\Contracts\Core\ApplicationInterface;
use Framework\Contracts\Core\BootstrapperInterface;

class ApplicationBootstrapper implements BootstrapperInterface
{
    /** @var ApplicationInterface $app */
    private $app;

    public function __construct(ApplicationInterface $app)
    {
        $this->app = $app;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap()
    {
        $this->loadDotenv();
        $this->loadHelperFunctions();
        $this->configErrorReporting();
    }

    /**
     * Load environment variables from the .env file 
     *
     * @return void
     */
    private function loadDotenv()
    {
        Dotenv::createImmutable(
            $this->app->getBasePath()
        )->load();
    }

    /**
     * Load helper functions
     *
     * @return void
     */
    private function loadHelperFunctions()
    {
        require_once $this->app->getBasePath() . '/helpers/helpers.php';
    }

    /**
     * Configure error reporting
     *
     * @return void
     */
    private function configErrorReporting()
    {
        // Report all errors
        error_reporting(E_ALL);

        // Display error only if debug mode is enabled
        ini_set('display_errors', env('DEBUG', false));
    }
}
