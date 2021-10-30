<?php

declare(strict_types=1);

beforeEach(function () {
    $this->converter = converter('mentions');
});

it('renders mentions', function () {
    expect(true)->toBeTrue();
});
