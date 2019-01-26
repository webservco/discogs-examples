<?php
namespace Project;

abstract class AbstractController extends \WebServCo\Framework\AbstractController
{
    protected $api;
    protected $repository;

    use \Project\Traits\ControllerDomainTrait;
    use \Project\Traits\ControllerI18nTrait;
    use \Project\Traits\ControllerMetaDomainTrait;
    use \Project\Traits\ControllerMetaTrait;
    use \Project\Traits\ControllerTrait;
    use \Project\Traits\ControllerViewTrait;

    use \Project\Traits\DatabaseTrait;

    public function __construct($namespace)
    {
        $this->initPaths();

        $outputLoader = new \Project\OutputLoader($this->data('path/project'));
        parent::__construct($outputLoader);

        $this->session()->start($this->data('path/project') . 'var/sessions');

        $this->initViews($namespace);
        $this->initI18n();

        $this->initDiscogs();
    }
}
