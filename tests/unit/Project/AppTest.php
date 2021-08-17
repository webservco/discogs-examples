<?php

declare(strict_types=1);

namespace Tests\Project;

use PHPUnit\Framework\TestCase;
use WebServCo\Framework\Application;

final class AppTest extends TestCase
{

    /**
    * @test
    */
    public function instantiationWithEmptyParameterThrowsException(): Application
    {
        $this->expectException(\WebServCo\Framework\Exceptions\ApplicationException::class);

        return new Application('', '', null);
    }

    /**
    * @test
    */
    public function instantiationWithDummyParameterThrowsException(): Application
    {
        $this->expectException(\WebServCo\Framework\Exceptions\ApplicationException::class);

        return new Application('foo', 'bar', null);
    }

    /**
    * @test
    */
    public function instantiationInvalidParameterThrowsException(): Application
    {
        $this->expectException(\WebServCo\Framework\Exceptions\ApplicationException::class);

        return new Application('/tmp', '/tmp', null);
    }
}
