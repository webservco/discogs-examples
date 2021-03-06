<?php

declare(strict_types=1);

namespace Project;

abstract class AbstractRepository extends \WebServCo\Framework\AbstractRepository
{
    use \Project\Traits\DatabaseTrait;
    use \Project\Traits\RepositoryTrait;

    public function __construct(\WebServCo\Framework\Interfaces\OutputLoaderInterface $outputLoader)
    {
        parent::__construct($outputLoader);
    }
}
