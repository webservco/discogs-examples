<?php declare(strict_types = 1);

namespace Project\Traits;

use WebServCo\Framework\Exceptions\ApplicationException;

trait ControllerTrait
{

    /**
     * Returns data if exists, $defaultValue otherwise.
     *
     * @param mixed $defaultValue
     * @return mixed
     */
    abstract public function data(string $key, $defaultValue = false);

    abstract protected function initDomain();

    abstract protected function initMeta($action);

    abstract protected function request();

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'app/path/project').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

    protected function setupPaths(): void
    {
        $this->setData('path', $this->config()->get('app/path'));
        $this->setData('url/app', $this->request()->getAppUrl());
        $this->setData('url/lang', $this->request()->getUrl(['lang']));
        $this->setData('url/current', $this->request()->getUrl());
    }

    /**
     * Called (optionally) by each method.
     */
    protected function init($action): void
    {
        $this->initDomain();
        $this->initMeta($action);
    }

    protected function requirePostMethod(): void
    {
        if (\WebServCo\Framework\Http\Method::POST !== $this->request()->getMethod()) {
            throw new ApplicationException('POST method required');
        }
    }
}
