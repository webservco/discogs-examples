<?php
namespace Project\Domain\Api;

use WebServCo\Framework\Http\Method;

class ApiController extends \Project\AbstractController
{
    use \Project\Traits\ApiTrait;

    public function __construct()
    {
        parent::__construct(__NAMESPACE__);

        $this->repository = new Repository($this->outputLoader);

        $this->initApi();
    }

    public function custom()
    {
        $this->init(__FUNCTION__);

        $form = new ApiForm([$this->data('defaultEndpoint')]);

        $template = $this->getView(__FUNCTION__);

        if ($form->isSent() && $form->isValid()) {
            try {
                switch ($form->data('method')) {
                    case Method::GET:
                        $apiResponse = $this->api->get($form->data('endpoint')); // \WebServCo\DiscogsApi\ApiResponse
                        break;
                    case Method::POST:
                        $apiResponse = $this->api->post($form->data('endpoint')); // \WebServCo\DiscogsApi\ApiResponse
                        break;
                    default:
                        throw new \WebServCo\Framework\Exceptions\NotImplementedException('Method not implemented');
                        break;
                }
                $this->setData('result/endpoint', $apiResponse->getEndpoint());
                $this->setData('result/errorMessage', $apiResponse->getErrorMessage());
                $this->setData('result/data', $apiResponse->getData());
                $this->setData('result/method', $apiResponse->getMethod());
                $this->setData('result/status', $apiResponse->getStatus());
            } catch (\WebServCo\DiscogsAuth\Exceptions\AuthException $e) { // Authorization error
                $this->setData('result/errorMessage', sprintf('AuthException: %s', $e->getMessage()));
            } catch (\WebServCo\DiscogsApi\Exceptions\ApiException $e) { // General API error
                $this->setData('result/errorMessage', sprintf('ApiException: %s', $e->getMessage()));
            } finally {
                $template = 'api/result';
            }
        } else {
            $this->setData('api/url', \WebServCo\DiscogsApi\Url::API);
            $this->setData('api/defaultEndpoint', sprintf('users/%s', $this->config()->get('discogs/api/username')));
            $this->setData('form', $form->toArray());
        }

        return $this->outputHtml($this->getData(), $template);
    }

    public function post()
    {
    }
}
