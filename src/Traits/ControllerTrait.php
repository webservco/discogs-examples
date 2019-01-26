<?php
namespace Project\Traits;

use WebServCo\Framework\Exceptions\ApplicationException;

trait ControllerTrait
{
    abstract public function data($key, $defaultValue = false);
    abstract protected function initDomain();
    abstract protected function initMeta($action);
    abstract protected function request();
    abstract protected function setData($key, $value);

    protected function initPaths()
    {
        $this->setData('path', $this->config()->get('app/path'));
        $this->setData('url/app', $this->request()->getAppUrl());
        $this->setData('url/lang', $this->request()->getUrl(['lang']));
        $this->setData('url/current', $this->request()->getUrl());
    }

    /**
     * Called (optionally) by each method.
     */
    protected function init($action)
    {
        $this->initDomain();
        $this->initMeta($action);
    }

    /*
    * Loads Discogs configuration array.
    */
    protected function initDiscogs()
    {
        $this->config()->add(
            'discogs',
            $this->config()->load(
                'Discogs',
                $this->data('path/project')
            )
        );
        $this->setData('discogs/config', $this->config()->get('discogs'));
    }

    protected function requirePostMethod()
    {
        if (\WebServCo\Framework\Http\Method::POST != $this->request()->getMethod()) {
            throw new ApplicationException('POST method required');
        }
    }
}
