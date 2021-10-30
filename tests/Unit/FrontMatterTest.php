<?php

declare(strict_types=1);

$data = [
    'index' => [
        'First' => [
            'first-link' => 'First Link',
            'second-link' => 'Second Link',
        ],
        'Second' => [
            'third-link' => 'Third Link',
            'fourth-link' => 'Fourth Link',
        ],
    ],
];

beforeEach(function () {
    $this->converter = converter('front-matter');
});

it('parses front matter', function () use ($data) {
    expect($this->converter->getFrontMatter())->toEqual($data);
});

it('parses front matter index', function () use ($data) {
    expect($this->converter->getIndex())->toEqual($data['index']);
});
