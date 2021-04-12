<?php declare(strict_types = 1);

namespace Project\Traits;

trait DiscogsApiTrait
{

    protected $api;

    abstract protected function config();

    protected function initDiscogsApi(): void
    {
        $this->api = \WebServCo\DiscogsApi\ApiHelper::init(
            $this->config()->get('discogs/api'), // $apiConfig
            \WebServCo\Framework\Environment\Config::string('APP_PATH_LOG'), // $logPath
            \sprintf('%svar/tmp/', \WebServCo\Framework\Environment\Config::string('APP_PATH_PROJECT')) // $tmpPath
        );
    }
}
