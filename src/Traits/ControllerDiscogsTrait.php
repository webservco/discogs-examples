<?php declare(strict_types = 1);

namespace Project\Traits;

trait ControllerDiscogsTrait
{
    abstract protected function config();

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'app/path/project').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

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
