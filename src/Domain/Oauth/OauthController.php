<?php
namespace Project\Domain\Oauth;

class OauthController extends \Project\AbstractController
{
    use \Project\Traits\ApiTrait;

    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);

        $this->initApi();
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
            $result = $apiObject->post();
            $this->setData('result', $result);
        } catch (\WebServCo\DiscogsAuth\Exceptions\AuthException $e) {
            $this->setData('error/auth', $e->getMessage());
        } catch (\WebServCo\DiscogsApi\Exceptions\ApiException $e) {
            $this->setData('error/api', $e->getMessage());
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
            $result = $apiObject->get();
            $this->setData('result', $result);
        } catch (\WebServCo\DiscogsAuth\Exceptions\AuthException $e) {
            $this->setData('error/auth', $e->getMessage());
        } catch (\WebServCo\DiscogsApi\Exceptions\ApiException $e) {
            $this->setData('error/api', $e->getMessage());
        }

        return $this->outputHtml($this->getData(), 'api/result');
    }

    public function redirect() // step 3
    {
        $this->init(__FUNCTION__);

        return $this->getRedirectUrlResponse(
            sprintf(
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
            $result = $apiObject->get();
            $this->setData('result', $result);
        } catch (\WebServCo\DiscogsAuth\Exceptions\AuthException $e) {
            $this->setData('error/auth', $e->getMessage());
        } catch (\WebServCo\DiscogsApi\Exceptions\ApiException $e) {
            $this->setData('error/api', $e->getMessage());
        }

        return $this->outputHtml($this->getData(), 'api/result');
    }
}
