<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\Mention\MentionExtension;

class Mentions extends Plugin
{
    public static function config(array $config): array
    {
        return [
            'mentions' => [
                'github_handle' => [
                    'prefix'    => '@',
                    'pattern'   => '[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}(?!\w)',
                    'generator' => 'https://github.com/%s',
                ],
                'twitter_handle' => [
                    'prefix'    => '#',
                    'pattern'   => '[A-Za-z0-9_]{1,15}(?!\w)',
                    'generator' => 'https://twitter.com/%s',
                ],
            ],
        ];
    }

    public static function extension(): ExtensionInterface
    {
        return new MentionExtension();
    }
}
