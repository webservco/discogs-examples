<?php
namespace Project\Traits;

trait ControllerDiscogsTrait
{
    abstract protected function config();

    abstract public function setData($key, $value);

    /*
    * Loads Discogs configuration array.
    */
    protected function initDiscogsConfig()
    {
        $this->config()->add(
            'discogs',
            $this->config()->load(
                'Discogs',
                $this->config()->get('app/path/project')
            )
        );
        $this->setData('discogs/config', $this->config()->get('discogs'));
    }
}
