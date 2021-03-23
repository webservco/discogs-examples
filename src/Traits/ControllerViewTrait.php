<?php declare(strict_types = 1);

namespace Project\Traits;

trait ControllerViewTrait
{

    /**
     * Returns data if exists, $defaultValue otherwise.
     *
     * @param mixed $defaultValue
     * @return mixed
     */
    abstract public function data(string $key, $defaultValue = false);

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'app/path/project').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

    protected function initViews($namespace): void
    {
        $parts = \explode('\\', $namespace);
        $this->setData('dir/views', \strtolower((string) \end($parts)));
    }

    protected function getView($templateName)
    {
        return \sprintf('%s/%s', $this->data('dir/views'), $templateName);
    }
}
