<?php
namespace Project\Traits;

trait ControllerMetaDomainTrait
{
    protected function getMeta($action)
    {
        switch ($action) {
            default:
                return $this->getDefaultMeta();
                break;
        }
    }

    protected function getDefaultMeta()
    {
        return [
            'title' => 'Discogs Examples',
            'description' => __('Discogs libraries implementation examples.'),
        ];
    }
}
