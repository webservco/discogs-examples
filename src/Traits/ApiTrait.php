<?php
namespace Project\Traits;

trait ApiTrait
{
    protected $api;

    protected function initApi()
    {
        $this->api = \WebServCo\DiscogsApi\ApiHelper::init(
            $this->config()->get('discogs/api'),
            $this->config()->get('app/path/log')
        );
    }
}
