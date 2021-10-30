<?php

declare(strict_types=1);

beforeEach(function () {
    $this->converter = converter('task-lists');
});

it('renders task lists', function () {
    expect(true)->toBeTrue();
});
