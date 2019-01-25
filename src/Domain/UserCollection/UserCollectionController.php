<?php
namespace Project\Domain\UserCollection;

class UserCollectionController extends \Project\AbstractController
{
    use \Project\Traits\ControllerApiTrait;

    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);
    }

    public function value()
    {
        $this->init(__FUNCTION__);
        $this->initApi();

        $apiObject = new \WebServCo\DiscogsApi\User\Collection\Value(
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
