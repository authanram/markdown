<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\ExtensionInterface;

class HeadingPermalinks extends Plugin
{
    public static function config(array $config): array
    {
        return [
            'heading_permalink' => [
                'html_class' => 'heading-permalink',
                'id_prefix' => 'content',
                'fragment_prefix' => 'content',
                'insert' => 'before',
                'min_heading_level' => 1,
                'max_heading_level' => 6,
                'title' => 'Permalink',
                'symbol' => '#',
            ],
        ];
    }

    public static function extension(): ExtensionInterface
    {
        return new HeadingPermalinkExtension();
    }
}
