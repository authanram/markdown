<?php

declare(strict_types=1);

use Authanram\Markdown\Converter;

function converter(string $basename): Converter
{
    $markdown = file_get_contents(__DIR__.'/TestFiles/'.$basename.'.md');

    $config = ['converter' => ['base_url' => 'https://docs.test/docs']];

    return (new Converter($config))->withMarkdown($markdown);
}
