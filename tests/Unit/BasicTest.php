<?php

declare(strict_types=1);

use Authanram\Markdown\Converter;

$config = require __DIR__.'/../../src/config.php';
$markdown = file_get_contents(__DIR__.'/../TestFiles/front-matter.md');

beforeEach(function () use ($config) {
    $this->config = $config;
});

it('...', function () use ($markdown) {
    $converter = new Converter($markdown, $this->config);

//    dump($converter->getDocument());
//    dump($converter->getFrontMatter());
    dump($converter->getIndex());
    dump($converter->toHtml());

    expect(true)->toBeTrue();
});
