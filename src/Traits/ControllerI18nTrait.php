<?php
namespace Project\Traits;

use WebServCo\Framework\Framework;

trait ControllerI18nTrait
{
    abstract protected function i18n();
    abstract protected function request();
    abstract protected function session();
    
    /**
     * @param mixed $key Can be an array, a string,
     *                          or a special formatted string
     *                          (eg 'app/path/project').
     * @param mixed $value The value to be stored.
     * @return bool True on success and false on failure.
     */
    abstract protected function setData($key, $value): bool;

    protected function initI18n()
    {
        $this->setData('i18n/langs', $this->i18n()->getLanguages());
        $this->checkLanguage();
        $this->setData('i18n/lang', $this->i18n()->getLanguage());
    }

    protected function checkLanguage()
    {
        /**
         * Get language set by session.
        */
        if (!Framework::isCli()) { // no session in CLI
            $lang = $this->session()->get('i18n/language');
        } else {
            $lang = null;
        }

        $this->i18n()->init($this->data('path/project'), $lang);

        /**
         * Check switch request.
         */
        $requestLang = $this->request()->query('lang');
        if (!empty($requestLang)) {
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
        if (!empty($acceptLanguage) && array_key_exists($acceptLanguage, $this->data('i18n/langs'))) {
            $lang = $acceptLanguage;
        }

        /**
         * Set language
         */
        return $this->setLanguage($lang);
    }

    protected function setLanguage($lang)
    {
        if (!Framework::isCli()) { // no session in CLI
            $this->session()->set('i18n/language', $lang);
        }
        $this->i18n()->setLanguage($lang);
        return true;
    }
}
