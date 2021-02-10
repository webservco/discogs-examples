<?php declare(strict_types = 1);

namespace Project\Domain\UserIdentity;

class Controller extends \Project\AbstractController
{

    use \Project\Traits\DiscogsApiTrait;

    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);

        $this->initDiscogsApi();
    }

    public function profile()
    {
        $this->init(__FUNCTION__);

        $apiObject = new \WebServCo\DiscogsApi\Api\User\Identity\Profile(
            $this->api,
            $this->config()->get('discogs/api/username')
        );

        try {
            $apiResponse = $apiObject->get();
            $this->setData('result/endpoint', $apiResponse->getEndpoint());
            $this->setData('result/errorMessage', $apiResponse->getErrorMessage());
            $this->setData('result/data', $apiResponse->getData());
            $this->setData('result/method', $apiResponse->getMethod());
            $this->setData('result/status', $apiResponse->getStatus());
        } catch (\WebServCo\DiscogsAuth\Exceptions\AuthException $e) {
            $this->setData('result/errorMessage', \sprintf('AuthException: %s', $e->getMessage()));
        } catch (\WebServCo\DiscogsApi\Exceptions\ApiException $e) {
            $this->setData('result/errorMessage', \sprintf('ApiException: %s', $e->getMessage()));
        } catch (\WebServCo\DiscogsApi\Exceptions\ApiResponseException $e) { 
            $this->setData('result/errorMessage', \sprintf('ApiResponseException: %s', $e->getMessage()));
        }

        return $this->outputHtml($this->getData(), 'api/result');
    }
}
