<?php declare(strict_types = 1);

namespace Project\Traits;

trait DatabaseTrait
{
    final protected function db()
    {
        return $this->mysqlPdoDb();
    }
}
