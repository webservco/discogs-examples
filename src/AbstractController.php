<?php

declare(strict_types=1);

namespace Project;

abstract class AbstractController extends \WebServCo\Framework\AbstractController
{
    use \Project\Traits\ControllerDiscogsTrait;
    use \Project\Traits\ControllerDomainTrait;
    use \Project\Traits\ControllerI18nTrait;
    use \Project\Traits\ControllerMetaDomainTrait;
    use \Project\Traits\ControllerMetaTrait;
    use \Project\Traits\ControllerTrait;
    use \Project\Traits\ControllerViewTrait;
    use \Project\Traits\DatabaseTrait;

    protected $api;
    protected $repository;

    public function __construct(string $namespace)
    {
        $projectPath = \WebServCo\Framework\Environment\Config::string('APP_PATH_PROJECT');

        // no library code before calling the parent constructor
        $outputLoader = new OutputLoader($projectPath);

        parent::__construct($outputLoader);

        $this->setupPaths();

        // no session in CLI
        if (!\WebServCo\Framework\Helpers\PhpHelper::isCli()) {
            $this->session()->start(\sprintf('%svar/sessions', $projectPath));
        }

        $this->initViews($namespace);
        $this->initI18n();

        $this->initDiscogsConfig();
    }
}
