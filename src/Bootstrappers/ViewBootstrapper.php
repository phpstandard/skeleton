<?php

namespace Bootstrappers;

use Framework\Contracts\Core\ApplicationInterface;
use Framework\Contracts\Core\BootstrapperInterface;
use Framework\Contracts\View\ViewFinderInterface;

class ViewBootstrapper implements BootstrapperInterface
{
    /** @var ViewFinderInterface $finder */
    private $finder;

    /** @var ApplicationInterface $app */
    private $app;

    public function __construct(
        ApplicationInterface $app,
        ViewFinderInterface $finder
    ) {
        $this->app = $app;
        $this->finder = $finder;
    }

    /**
     * @inheritDoc
     */
    public function bootstrap()
    {
        $this->finder->addPath($this->app->getBasePath() . '/resources/views/');
    }
}
