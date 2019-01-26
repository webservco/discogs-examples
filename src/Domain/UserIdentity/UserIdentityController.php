<?php
namespace Project\Domain\UserIdentity;

class UserIdentityController extends \Project\AbstractController
{
    use \Project\Traits\ApiTrait;

    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);

        $this->initApi();
    }

    public function profile()
    {
        $this->init(__FUNCTION__);

        $apiObject = new \WebServCo\DiscogsApi\Api\User\Identity\Profile(
            $this->api,
            $this->config()->get('discogs/api/username')
        );

        try {
            $result = $apiObject->get();
            $this->setData('result', $result);
        } catch (\WebServCo\DiscogsAuth\Exceptions\AuthException $e) {
            $this->setData('error/auth', $e->getMessage());
        } catch (\WebServCo\DiscogsApi\Exceptions\ApiException $e) {
            $this->setData('error/api', $e->getMessage());
        }

        return $this->outputHtml($this->getData(), 'apiResult');
    }
}
