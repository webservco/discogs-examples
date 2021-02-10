<?php declare(strict_types = 1);

namespace Project\Traits;

trait ControllerMetaTrait
{

    abstract protected function getMeta($action);
    
    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'app/path/project').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

    protected function initMeta($action): void
    {
        $this->setData('meta', $this->getMeta($action));
    }
}
