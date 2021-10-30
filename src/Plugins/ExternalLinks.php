<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;

class ExternalLinks extends Plugin
{
    public static function config(array $config): array
    {
        $config['external_link'] = [
            'internal_hosts' => static::getHost($config),
            'open_in_new_window' => false,
            'html_class' => 'external-link',
            'nofollow' => '',
            'noopener' => 'external',
            'noreferrer' => 'external',
        ];

        return $config;
    }

    public static function extension(): ExtensionInterface
    {
        return new ExternalLinkExtension();
    }

    private static function getHost(array $config): string
    {
        return parse_url($config['base_url'])['host'];
    }
}
