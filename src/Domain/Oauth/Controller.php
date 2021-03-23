<?php declare(strict_types = 1);

namespace Project\Domain\Oauth;

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

    public function accessToken() // step 4
    {
        $this->init(__FUNCTION__);

        /*
        * Config auth/type ignored
        * This endpoint requires custom authorization.
        */
        $auth = new \WebServCo\DiscogsAuth\OAuth\AccessToken(
            $this->config()->get('discogs/api/auth/app/consumerKey'),
            $this->config()->get('discogs/api/auth/app/consumerSecret'),
            $this->config()->get('discogs/api/auth/oauth/flow/oauthToken'),
            $this->config()->get('discogs/api/auth/oauth/flow/oauthTokenSecret'),
            $this->config()->get('discogs/api/auth/oauth/flow/oauthVerifier')
        );
        $this->api->setAuthInterface($auth);

        $apiObject = new \WebServCo\DiscogsApi\Api\OAuth\AccessToken($this->api);

        try {
            $apiResponse = $apiObject->post();
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

    public function callback() // step 3
    {
        $this->init(__FUNCTION__);
        $this->setData('denied', $this->request()->query('denied'));
        $this->setData('oauth_token', $this->request()->query('oauth_token'));
        $this->setData('oauth_verifier', $this->request()->query('oauth_verifier'));
        return $this->outputHtml($this->getData(), $this->getView(__FUNCTION__));
    }

    public function identity() // step 5
    {
        $this->init(__FUNCTION__);

        $apiObject = new \WebServCo\DiscogsApi\Api\OAuth\Identity($this->api);

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

    public function redirect() // step 3
    {
        $this->init(__FUNCTION__);

        return $this->getRedirectUrlResponse(
            \sprintf(
                'https://discogs.com/oauth/authorize?oauth_token=%s',
                $this->config()->get('discogs/api/auth/oauth/flow/oauthToken')
            )
        );
    }

    public function requestToken() // step 2
    {
        $this->init(__FUNCTION__);

        /*
        * Config auth/type ignored
        * This endpoint requires custom authorization.
        */
        $auth = new \WebServCo\DiscogsAuth\OAuth\RequestToken(
            $this->config()->get('discogs/api/auth/app/consumerKey'),
            $this->config()->get('discogs/api/auth/app/consumerSecret'),
            $this->config()->get('discogs/api/auth/oauth/flow/callback')
        );
        $this->api->setAuthInterface($auth);

        $apiObject = new \WebServCo\DiscogsApi\Api\OAuth\RequestToken($this->api);

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
