<?php

declare(strict_types=1);

use Authanram\Markdown\Converter;

function converter(string $basename): Converter
{
    return new Converter(
        file_get_contents(__DIR__.'/TestFiles/'.$basename.'.md'),
        require __DIR__.'/../src/config.php',
        'https://docs.test/docs',
    );
}
