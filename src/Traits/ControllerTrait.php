<?php

declare(strict_types=1);

namespace Project\Traits;

use WebServCo\Framework\Exceptions\ApplicationException;

trait ControllerTrait
{

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'i18n/lang').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract public function setData($key, $value): bool;

    abstract protected function initDomain(): void;

    abstract protected function initMeta(string $action): void;

    abstract protected function request(): \WebServCo\Framework\Interfaces\RequestInterface;

    protected function setupPaths(): void
    {
        $this->setData('url/app', $this->request()->getAppUrl());
        $this->setData('url/lang', $this->request()->getUrl(['lang']));
        $this->setData('url/current', $this->request()->getUrl());
    }

    /**
     * Called (optionally) by each method.
     */
    protected function init(string $action): void
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
