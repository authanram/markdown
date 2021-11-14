<?php

declare(strict_types=1);

use Authanram\Markdown\Converter;

function converter(string $basename): Converter
{
    return (new Converter(
        require __DIR__.'/../src/config.php',
        'https://docs.test/docs',
    ))->withMarkdown(file_get_contents(__DIR__.'/TestFiles/'.$basename.'.md'));
}
