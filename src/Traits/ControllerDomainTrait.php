<?php declare(strict_types = 1);

namespace Project\Traits;

trait ControllerDomainTrait
{

    /**
     * Returns data if exists, $defaultValue otherwise.
     *
     * @param mixed $defaultValue
     * @return mixed
     */
    abstract public function data(string $key, $defaultValue = false);

    abstract protected function config();

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'app/path/project').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

    protected function initDomain(): void
    {
        /* custom configuration settings */
        $this->config()->add(
            'app',
            $this->config()->load(
                'App',
                $this->data('path/project')
            )
        );

        $this->setData('location/current', $this->request()->getTarget());
    }
}
