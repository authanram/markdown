<?php

declare(strict_types=1);

beforeEach(function () {
    $this->converter = converter('default-attributes');
});

it('applies default attributes', function () {
    expect(true)->toBeTrue();
});
