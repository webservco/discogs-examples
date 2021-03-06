<?php

declare(strict_types=1);

namespace Project\Domain\UserCollection;

use WebServCo\DiscogsApi\Exceptions\ApiException;
use WebServCo\DiscogsApi\Exceptions\ApiResponseException;
use WebServCo\DiscogsAuth\Exceptions\AuthException;

class Controller extends \Project\AbstractController
{
    use \Project\Traits\DiscogsApiTrait;

    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);

        $this->initDiscogsApi();
    }

    public function fields()
    {
        $this->init(__FUNCTION__);

        $apiObject = new \WebServCo\DiscogsApi\Api\User\Collection\Fields(
            $this->api,
            \WebServCo\Framework\Environment\Config::string('APP_DISCOGS_MISC_USERNAME'),
        );

        try {
            $apiResponse = $apiObject->get();
            $this->setData('result/endpoint', $apiResponse->getEndpoint());
            $this->setData('result/errorMessage', $apiResponse->getErrorMessage());
            $this->setData('result/data', $apiResponse->getData());
            $this->setData('result/method', $apiResponse->getMethod());
            $this->setData('result/status', $apiResponse->getStatus());
        } catch (AuthException $e) {
            $this->setData('result/errorMessage', \sprintf('AuthException: %s', $e->getMessage()));
        } catch (ApiException $e) {
            $this->setData('result/errorMessage', \sprintf('ApiException: %s', $e->getMessage()));
        } catch (ApiResponseException $e) {
            $this->setData('result/errorMessage', \sprintf('ApiResponseException: %s', $e->getMessage()));
        }

        return $this->outputHtml($this->getData(), 'api/result');
    }

    public function value()
    {
        $this->init(__FUNCTION__);

        $apiObject = new \WebServCo\DiscogsApi\Api\User\Collection\Value(
            $this->api,
            \WebServCo\Framework\Environment\Config::string('APP_DISCOGS_MISC_USERNAME'),
        );

        try {
            $apiResponse = $apiObject->get();
            $this->setData('result/endpoint', $apiResponse->getEndpoint());
            $this->setData('result/errorMessage', $apiResponse->getErrorMessage());
            $this->setData('result/data', $apiResponse->getData());
            $this->setData('result/method', $apiResponse->getMethod());
            $this->setData('result/status', $apiResponse->getStatus());
        } catch (AuthException $e) {
            $this->setData('result/errorMessage', \sprintf('AuthException: %s', $e->getMessage()));
        } catch (ApiException $e) {
            $this->setData('result/errorMessage', \sprintf('ApiException: %s', $e->getMessage()));
        } catch (ApiResponseException $e) {
            $this->setData('result/errorMessage', \sprintf('ApiResponseException: %s', $e->getMessage()));
        }

        return $this->outputHtml($this->getData(), 'api/result');
    }
}
