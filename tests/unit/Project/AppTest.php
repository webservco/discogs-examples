<?php

declare(strict_types=1);

namespace Tests\Project;

use PHPUnit\Framework\TestCase;
use Project\App;

final class AppTest extends TestCase
{

    /**
    * @test
    */
    public function instantiationWithEmptyParameterThrowsException(): App
    {
        $this->expectException(\WebServCo\Framework\Exceptions\ApplicationException::class);

        return new App('', '', null);
    }

    /**
    * @test
    */
    public function instantiationWithDummyParameterThrowsException(): App
    {
        $this->expectException(\WebServCo\Framework\Exceptions\ApplicationException::class);

        return new App('foo', 'bar', null);
    }

    /**
    * @test
    */
    public function instantiationInvalidParameterThrowsException(): App
    {
        $this->expectException(\WebServCo\Framework\Exceptions\ApplicationException::class);

        return new App('/tmp', '/tmp', null);
    }
}
