<?php
namespace Project\Traits;

use WebServCo\Framework\Exceptions\ApplicationException;

trait ControllerDomainTrait
{
    abstract protected function config();
    abstract public function data($key, $defaultValue = false);
    abstract protected function setData($key, $value);

    protected function initDomain()
    {
        /*  use debug only in development mode (localhost) */
        if ($this->config()->getEnv() == \WebServCo\Framework\Environment::ENV_DEV) {
            $this->setData('useDebug', true);
        }

        /* custom configuration settings */
        $this->config()->add(
            'app',
            $this->config()->load(
                'App',
                $this->data('path/project')
            )
        );

        $this->config()->add(
            'discogs',
            $this->config()->load(
                'Discogs',
                $this->data('path/project')
            )
        );

        $this->setData('location/current', $this->request()->getTarget());
    }
}
