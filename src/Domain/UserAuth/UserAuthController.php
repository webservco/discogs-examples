<?php
namespace Project\Domain\UserAuth;

class UserAuthController extends \Project\AbstractController
{
    protected $api;

    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new UserAuthRepository($this->outputLoader);

        // Initialize the Auth library
        $auth = new \WebServCo\DiscogsAuth\Discogs\User(
            $this->config()->get('discogs/api/authUser/personalAccessToken/')
        );

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

        // Initialize the API
        $this->api = new \WebServCo\DiscogsApi\Api(
            $auth,
            $browser,
            $apiLogger,
            $this->config()->get('discogs/api/userAgent')
        );
    }

    public function profile()
    {
        $this->init(__FUNCTION__);

        $profile = new \WebServCo\DiscogsApi\User\Identity\Profile(
            $this->api,
            $this->config()->get('discogs/api/username')
        );

        try {
            $result = $profile->get();
        } catch (\WebServCo\DiscogsAuth\Exceptions\DiscogsAuthException $e) {
            $this->setData('error/auth', $e->getMessage());
        } catch (\WebServCo\DiscogsApi\Exceptions\DiscogsApiException $e) {
            $this->setData('error/api', $e->getMessage());
        }

        return $this->outputHtml($this->getData(), $this->getView(__FUNCTION__));
    }
}
