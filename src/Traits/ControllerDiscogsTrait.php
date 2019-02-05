<?php
namespace Project\Traits;

trait ControllerDiscogsTrait
{
    /*
    * Loads Discogs configuration array.
    */
    protected function initDiscogsConfig()
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
}
