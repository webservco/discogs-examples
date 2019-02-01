<?php
namespace Project\Domain\Api;

final class ApiForm extends \Project\AbstractForm
{
    public function __construct($defaultData = [])
    {
        parent::__construct(
            [
                'meta' => [
                    'endpoint' => 'Endpoint',
                    'method' => 'Method',
                    'postData' => 'POST data',
                ],
                'required' => [
                    'endpoint',
                    'method',
                ],
                'trim' => [
                    'endpoint',
                ],
                'filterNumeric' => [
                ],
            ],
            $defaultData,
            ['submit'] //$submitFields
        );
    }

    protected function validate()
    {
        parent::validate();

        if (!empty($this->errors)) {
            return false;
        }

        /* custom valdiation */

        return true;
    }
}
