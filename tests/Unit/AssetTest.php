<?php

declare(strict_types=1);

use Authanram\Markdown\Assert;

it('throws if url is empty', function () {
    Assert::url('');
})->expectExceptionMessage('Expected url, got: "".');

it('throws if url is invalid', function () {
    Assert::url('first');
})->expectExceptionMessage('Expected url, got: "first".');

it('passes', function () {
    expect(Assert::url('https://foo.bar'))->toBeTrue();
});
