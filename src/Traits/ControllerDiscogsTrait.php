<?php

declare(strict_types=1);

namespace Project\Traits;

trait ControllerDiscogsTrait
{

    abstract protected function config(): void;

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg '18n/lang').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

    /*
    * Loads Discogs configuration array.
    */
    protected function initDiscogsConfig(): void
    {
        $this->config()->add(
            'discogs',
            $this->config()->load(
                'Discogs',
                \WebServCo\Framework\Environment\Config::string('APP_PATH_PROJECT'),
            ),
        );
        $this->setData('discogs/config', $this->config()->get('discogs'));
    }
}
