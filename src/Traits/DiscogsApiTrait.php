<?php declare(strict_types = 1);

namespace Project\Traits;

trait DiscogsApiTrait
{
    protected $api;

    abstract protected function config();

    protected function initDiscogsApi()
    {
        $this->api = \WebServCo\DiscogsApi\ApiHelper::init(
            $this->config()->get('discogs/api'), // $apiConfig
            $this->config()->get('app/path/log'), // $logPath
            sprintf('%svar/tmp/', $this->config()->get('app/path/project')) // $tmpPath
        );
    }
}
