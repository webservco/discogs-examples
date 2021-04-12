<?php

declare(strict_types=1);

namespace Project\Traits;

trait ControllerMetaTrait
{

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'i18n/lang').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract public function setData($key, $value): bool;

    /**
    * @return array<string,string>
    */
    abstract protected function getMeta(string $action): array;

    protected function initMeta(string $action): void
    {
        $this->setData('meta', $this->getMeta($action));
    }
}
