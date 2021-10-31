<?php

declare(strict_types=1);

use Authanram\Markdown\Plugins;

return [

    'converter' => [
        'base_url' => 'https://docs.test/docs',

        'plugins' => [
            Plugins\AttributesMap::class,
            Plugins\AutoLinks::class,
            Plugins\AutoLinks::class,
            Plugins\DefaultAttributes::class,
            Plugins\ExternalLinks::class,
            Plugins\FootNote::class,
            Plugins\FrontMatter::class,
            Plugins\HeadingPermalinks::class,
            Plugins\Mentions::class,
            Plugins\TaskList::class,
        ],
    ],

    'renderer' => [
        'block_separator' => "\n",
        'inner_separator' => "\n",
        'soft_break'      => "\n",
    ],

    'commonmark' => [
        'enable_em' => true,
        'enable_strong' => true,
        'use_asterisk' => true,
        'use_underscore' => true,
        'unordered_list_markers' => ['-', '*', '+'],
    ],

    'html_input' => 'escape',

    'allow_unsafe_links' => false,

    'max_nesting_level' => PHP_INT_MAX,

    'slug_normalizer' => [
        'max_length' => 255,
    ],

];
