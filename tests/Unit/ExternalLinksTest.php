<?php

declare(strict_types=1);

use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

beforeEach(function () {
    $this->converter = converter('external-links');
});

it('renders external links', function () {
    $converter = $this->converter;

    $nodes = $converter->query()
        ->where($converter->query()::type(Link::class))
        ->findAll($converter->getDocument());

    expect($converter->map($nodes, fn ($i) => $i->data->get('external')))
        ->toEqual([false, true]);
});
