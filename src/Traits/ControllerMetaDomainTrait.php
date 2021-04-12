<?php

declare(strict_types=1);

namespace Project\Traits;

trait ControllerMetaDomainTrait
{

    /**
    * @return array<string,string>
    */
    protected function getMeta(string $action): array
    {
        switch ($action) {
            default:
                return $this->getDefaultMeta();
        }
    }

    /**
    * @return array<string,string>
    */
    protected function getDefaultMeta(): array
    {
        return [
            'title' => 'Discogs Examples',
            'description' => \__('Discogs libraries implementation examples.'),
        ];
    }
}
