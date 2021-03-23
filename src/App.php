<?php declare(strict_types = 1);

namespace Project;

final class App extends \WebServCo\Framework\App
{

    /*
    * Needs to be inside the project becasue of the __NAMESPACE__ usage.
    */
    public function __construct(string $publicPath, string $projectPath = '')
    {
        /**
         * Project can be located in a completely different place
         * than the web directory.
         */
         $projectPath = \WebServCo\Framework\Utils\Strings::isEmpty($projectPath)
              ? (string) \realpath($publicPath . '/..')
              : $projectPath;

        parent::__construct($publicPath, $projectPath, __NAMESPACE__);

        $this->config()->set('app/path/log', \sprintf('%svar/log/', $this->projectPath));
    }
}
