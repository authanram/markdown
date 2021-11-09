<?php

declare(strict_types=1);

use Authanram\Markdown\Plugins;

return [

    'converter' => [
        'plugins' => [
            Plugins\Attributes::class,
            Plugins\AutoLinks::class,
            Plugins\AutoLinks::class,
            Plugins\DefaultAttributes::class,
            Plugins\DescriptionLists::class,
            Plugins\DisallowedRawHtml::class,
            Plugins\ExternalLinks::class,
            Plugins\FootNote::class,
            Plugins\FrontMatter::class,
            Plugins\HeadingPermalinks::class,
            Plugins\Mentions::class,
            Plugins\SvgIcons::class,
            Plugins\TaskList::class,
        ],

        'assets' => [
            'css' => 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/github.min.css',
            'js' => 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js',
        ],
    ],

    'renderer' => [
        'block_separator' => "\n",
        'inner_separator' => "\n",
        'soft_break' => "\n",
    ],

    'commonmark' => [
        'enable_em' => true,
        'enable_strong' => true,
        'use_asterisk' => true,
        'use_underscore' => true,
        'unordered_list_markers' => ['-', '*', '+'],
    ],

    'html_input' => 'allow',

    'allow_unsafe_links' => false,

    'max_nesting_level' => PHP_INT_MAX,

    'slug_normalizer' => [
        'max_length' => 255,
    ],

];
