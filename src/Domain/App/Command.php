<?php
namespace Project\Domain\App;

use WebServCo\Framework\Cli\Ansi;
use WebServCo\Framework\Cli\Sgr;

final class Command extends \Project\AbstractController
{
    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);
    }

    public function home()
    {
        $this->init(__FUNCTION__);

        $this->outputCli(Ansi::clear(), true);
        $this->outputCli(Ansi::sgr(__METHOD__, [Sgr::BOLD]), true);
        $this->outputCli();
        $this->outputCli('Hello World!');
        $this->outputCli();
        return new \WebServCo\Framework\Cli\Response('', true);
    }
}
