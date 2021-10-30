<?php

declare(strict_types=1);

use League\CommonMark\Node\Block\Document;

beforeEach(function () {
    $this->converter = converter('front-matter');
});

it('resolves the document', function () {
    $document = $this->converter->getDocument();

    expect($document)->toBeInstanceOf(Document::class);
});

it('resolves front matter', function () {
    $frontMatter = $this->converter->getFrontMatter();

    expect($frontMatter)->not()->toBeEmpty();
    expect($frontMatter)->toBeArray();
});


it('resolves the index from font matter', function () {
    $index = $this->converter->getIndex();

    expect($index)->not()->toBeEmpty();
    expect($index)->toBeArray();
});


it('converts to html', function () {
    $html = $this->converter->toHtml();

    expect($html)->toBeString();
});
