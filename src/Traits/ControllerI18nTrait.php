<?php

declare(strict_types=1);

namespace Project\Traits;

trait ControllerI18nTrait
{

    abstract protected function i18n(): \WebServCo\Framework\Interfaces\I18nInterface;

    abstract protected function request(): \WebServCo\Framework\Interfaces\RequestInterface;

    abstract protected function session(): \WebServCo\Framework\Interfaces\SessionInterface;

    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'i18n/lang').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

    protected function initI18n(): void
    {
        $this->setData('i18n/langs', $this->i18n()->getLanguages());
        $this->checkLanguage();
        $this->setData('i18n/lang', $this->i18n()->getLanguage());
    }

    protected function checkLanguage(): bool
    {
        /**
         * Get language set by session.
         */

        // no session in CLI
        $lang = !\WebServCo\Framework\Helpers\PhpHelper::isCli()
            ? $this->session()->get('i18n/language')
            : null;

        $this->i18n()->init(\WebServCo\Framework\Environment\Config::string('APP_PATH_PROJECT'), (string) $lang);

        /**
         * Check switch request.
         */
        $requestLang = $this->request()->query('lang');

        if ($requestLang) {
            return $this->setLanguage($requestLang);
        }

        /**
         * Check if language is already set by session
         */
        if ($lang) {
            return false;
        }

        /**
         * Default if not previously set.
         */
        $lang = $this->i18n()->getLanguage();

        /**
         * Check browser accept language.
         */
        $acceptLanguage = $this->request()->getAcceptLanguage();

        if ($acceptLanguage && \array_key_exists($acceptLanguage, $this->data('i18n/langs'))) {
            $lang = $acceptLanguage;
        }

        /**
         * Set language
         */
        return $this->setLanguage($lang);
    }

    protected function setLanguage(string $lang): bool
    {
        // no session in CLI
        if (!\WebServCo\Framework\Helpers\PhpHelper::isCli()) {
            $this->session()->set('i18n/language', $lang);
        }
        $this->i18n()->setLanguage($lang);

        return true;
    }
}
