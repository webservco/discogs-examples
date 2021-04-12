<?php

declare(strict_types=1);

namespace Project;

use WebServCo\Framework\Framework;

final class OutputLoader extends \WebServCo\Framework\AbstractOutputLoader
{

    public function __construct(string $projectPath)
    {
        parent::__construct(
            $projectPath,
            Framework::library('HtmlOutput'),
            Framework::library('JsonOutput'),
        );
    }

    /**
    * @param array<int|string,mixed> $data
    */
    public function html(array $data, string $template): string
    {
        return parent::html($data, $template);
    }

    /**
    * @param array<int|string,mixed> $data
    */
    public function htmlPage(array $data, string $pageTemplate, ?string $mainTemplate = null): string
    {
        return parent::htmlPage($data, $pageTemplate, $mainTemplate);
    }

    /**
    * @param array<string,mixed> $data
    */
    public function json(array $data): string
    {
        return parent::json($data);
    }

    public function cli(string $string, bool $eol = true): bool
    {
        return parent::cli($string, $eol);
    }
}
