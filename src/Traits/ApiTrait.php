<?php
namespace Project\Traits;

trait ApiTrait
{
    protected $api;

    protected function initApi()
    {
        $this->api = \WebServCo\DiscogsApi\ApiHelper::init(
            $this->config()->get('discogs/api'), // $apiConfig
            $this->config()->get('app/path/log'), // $logPath
            sprintf('%svar/tmp/', $this->config()->get('app/path/project')) // $tmpPath
        );
    }
}
