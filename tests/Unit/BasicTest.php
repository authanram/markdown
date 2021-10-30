<?php

declare(strict_types=1);

use Authanram\Markdown\Converter;

$config = require __DIR__.'/../../src/config.php';

$markdown = <<<MD
---
index:
    First:
        first-link: First Link
        second-link: Second Link
    Second:
        third-link: Third Link 
        fourth-link: Fourth Link
---
 
# Document Headline
MD;

beforeEach(function () use ($config) {
    $this->config = $config;
});

it('...', function () use ($markdown) {
    $document = (new Converter($this->config))->with($markdown);

    dump($document->getDocument());
    dump($document->getFrontMatter());
    dump($document->getHtml());
    dump($document->getIndex());

    expect(true)->toBeTrue();
});
