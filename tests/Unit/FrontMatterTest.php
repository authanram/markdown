<?php

declare(strict_types=1);

beforeEach(function () {
    $this->converter = converter('front-matter');
});

it('parses front matter', function () {
    expect(true)->toBeTrue();
});
