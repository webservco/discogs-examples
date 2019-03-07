<?php
namespace Project\Domain\App;

final class Controller extends \Project\AbstractController
{
    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);
    }

    public function home()
    {
        $this->init(__FUNCTION__);

        return $this->outputHtml($this->getData(), $this->getView(__FUNCTION__));
    }
}
