<?php

declare(strict_types=1);

use League\CommonMark\Extension\HeadingPermalink\HeadingPermalink;

beforeEach(function () {
    $this->converter = converter('heading-permalinks');
});

it('renders auto-links', function () {
    $converter = $this->converter;

    $nodes = $converter->query()
        ->where($converter->query()::type(HeadingPermalink::class))
        ->findAll($converter->getDocument());

    expect($converter->map($nodes, fn ($i) => $i))
        ->toHaveCount(4);
});
