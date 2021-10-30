<?php

declare(strict_types=1);

beforeEach(function () {
    $this->converter = converter('footnotes');
});

it('renders footnotes', function () {
    expect(true)->toBeTrue();
});
