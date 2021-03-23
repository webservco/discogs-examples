<?php declare(strict_types = 1);

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

    public function __construct($namespace)
    {
        // no library code before calling the parent constructor
        $outputLoader = new OutputLoader($this->config()->get('app/path/project'));

        parent::__construct($outputLoader);

        $this->setupPaths();

        if (!\WebServCo\Framework\Framework::isCli()) { // no session in CLI
            $this->session()->start($this->data('path/project') . 'var/sessions');
        }

        $this->initViews($namespace);
        $this->initI18n();

        $this->initDiscogsConfig();
    }
}
