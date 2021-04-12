<?php declare(strict_types = 1);

namespace Project\Traits;

use WebServCo\Framework\Environment\Config;

trait DiscogsApiTrait
{

    protected $api;

    abstract protected function config();

    protected function initDiscogsApi(): void
    {
        switch(Config::string('APP_DISCOGS_AUTH_TYPE')) {
            case 'app':
                $authLibrary = new \WebServCo\DiscogsAuth\Discogs\App(
                    Config::string('APP_DISCOGS_CONSUMER_KEY'),
                    Config::string('APP_DISCOGS_CONSUMER_SECRET'),
                );
                break;
            case 'oauth':
                $authLibrary = new \WebServCo\DiscogsAuth\OAuth\OAuth(
                    Config::string('APP_DISCOGS_CONSUMER_KEY'),
                    Config::string('APP_DISCOGS_CONSUMER_SECRET'),
                    Config::string('APP_DISCOGS_OAUTH_TOKEN'),
                    Config::string('app_discogs_oauth_token_secret'),
                );
                break;
            case 'user':
                $authLibrary = new \WebServCo\DiscogsAuth\Discogs\User(
                    Config::string('APP_DISCOGS_USER_PERSONAL_ACCESS_TOKEN'),
                );
                break;
            default:
                throw new \InvalidArgumentException('Invalid authorization type');
        }


        $logger = new \WebServCo\Framework\Log\FileLogger('DiscogsApi', Config::string('APP_PATH_LOG'));

        $httpLogger = new \WebServCo\Framework\Log\FileLogger('DiscogsApiBrowser', Config::string('APP_PATH_LOG'));

        $httpClient = new \WebServCo\Framework\Http\CurlClient($httpLogger);

        $rateLimiter = new \WebServCo\DiscogsApi\RateLimiter(
            \sprintf('%svar/tmp/', Config::string('APP_PATH_PROJECT'))
        );

        $settings = new \WebServCo\DiscogsApi\Settings(
            Config::bool('APP_DISCOGS_SETTINGS_DEBUG'),
            Config::bool('APP_DISCOGS_SETTINGS_RATE_LIMITING'),
            Config::string('APP_DISCOGS_SETTINGS_USER_AGENT'),
        );

        $this->api = new \WebServCo\DiscogsApi\Client(
            $authLibrary,
            $httpClient,
            $logger,
            $rateLimiter,
            $settings,
        );
    }
}
