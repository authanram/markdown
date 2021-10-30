<?php

declare(strict_types=1);

use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

beforeEach(function () {
    $this->converter = converter('mentions');
});

it('renders mentions', function () {
    $nodes = $this->converter->query()
        ->where($this->converter->query()::type(Link::class))
        ->findAll($this->converter->getDocument());

    expect($this->converter->map($nodes, fn ($i) => $i->getUrl()))
        ->toEqual([
            'https://github.com/authanram',
            'https://twitter.com/authanram',
        ]);
});
