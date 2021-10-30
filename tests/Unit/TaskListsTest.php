<?php

declare(strict_types=1);

use League\CommonMark\Extension\TaskList\TaskListItemMarker;

beforeEach(function () {
    $this->converter = converter('task-lists');
});

it('renders auto-links', function () {
    $nodes = $this->converter->query()
        ->where($this->converter->query()::type(TaskListItemMarker::class))
        ->findAll($this->converter->getDocument());

    expect($this->converter->map($nodes, fn ($i) => $i))
        ->toHaveCount(3);
});
