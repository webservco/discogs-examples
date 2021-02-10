<?php
namespace Project\Traits;

use WebServCo\Framework\Exceptions\ApplicationException;

trait ControllerDomainTrait
{
    abstract protected function config();

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

    protected function initDomain()
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
