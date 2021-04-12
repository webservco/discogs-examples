<?php

declare(strict_types=1);

namespace Project\Traits;

trait DatabaseTrait
{

    final protected function db(): \WebServCo\Framework\Interfaces\DatabaseInterface
    {
        return $this->mysqlPdoDb();
    }
}
