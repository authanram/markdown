<?php

declare(strict_types=1);

use League\CommonMark\Extension\CommonMark\Node\Block\Heading;

beforeEach(function () {
    $this->converter = converter('default-attributes');
});

it('applies default attributes', function () {
    $classAttribute = $this->converter->query()
        ->where($this->converter->query()::type(Heading::class))
        ->findOne($this->converter->getDocument())
        ->data->get('attributes.class');

    expect($classAttribute)->toEqual('heading');
});
