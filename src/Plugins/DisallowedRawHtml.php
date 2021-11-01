<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\Extension\ExtensionInterface;

class DisallowedRawHtml extends Plugin
{
    public static function config(array $config): array
    {
        return [
            'disallowed_raw_html' => [
                'disallowed_tags' => [
                    'iframe',
                    'noembed',
                    'noframes',
                    'plaintext',
                    'script',
                    'style',
                    'textarea',
                    'title',
                    'xmp',
                ],
            ],
        ];
    }

    public static function extension(): ExtensionInterface
    {
        return new DisallowedRawHtmlExtension();
    }
}
