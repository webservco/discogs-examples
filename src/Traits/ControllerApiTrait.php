<?php
namespace Project\Traits;

trait ControllerApiTrait
{
    protected $api;

    protected function getAuthLibrary($authType)
    {
        switch ($authType) {
            case 'user':
                return new \WebServCo\DiscogsAuth\Discogs\User(
                    $this->config()->get('discogs/api/authUser/personalAccessToken')
                );
                break;
            case 'app':
                return new \WebServCo\DiscogsAuth\Discogs\App(
                    $this->config()->get('discogs/api/authApp/consumerKey'),
                    $this->config()->get('discogs/api/authApp/consumerSecret')
                );
                break;
            case 'oauth':
                return new \WebServCo\DiscogsAuth\OAuth\OAuth(
                    $this->config()->get('discogs/api/authApp/consumerKey'),
                    $this->config()->get('discogs/api/authApp/consumerSecret')
                );
                break;
        }
    }

    protected function initApi()
    {
        $auth = $this->getAuthLibrary($this->config()->get('discogs/api/authType'));

        // Create a Logger for the API
        $apiLogger = new \WebServCo\Framework\Log\FileLogger(
            'api',
            $this->config()->get('app/path/log'),
            $this->request()
        );

        // Create a Logger for the Browser
        $browserLogger = new \WebServCo\Framework\Log\FileLogger(
            'browser',
            $this->config()->get('app/path/log'),
            $this->request()
        );

        // Initialize the Browser
        $browser = new \WebServCo\Framework\CurlBrowser($browserLogger);
        $browser->setDebug(true);

        // Initialize Api Settings
        $apiSettings = new \WebServCo\DiscogsApi\Settings(
            $this->config()->get('discogs/api/settings/processResponse'),
            $this->config()->get('discogs/api/settings/userAgent')
        );

        // Initialize the API
        $this->api = new \WebServCo\DiscogsApi\Api(
            $auth,
            $browser,
            $apiLogger,
            $apiSettings
        );
    }
}
