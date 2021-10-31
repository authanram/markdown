<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\ExtensionInterface;

class AutoLinks extends Plugin
{
    public static function config(array $config): array
    {
        return [
            'attributes_map' => [
                'h1' => [
                    'class' => 'text-4xl font-semibold tracking-normal leading-none',
                ],
                'h2' => [
                    'children' => ['a' => 'text-gray-800 ml-6 md:ml-0'],
                    'class' => 'text-3xl font-semibold tracking-normal',
                ],
                'h3' => [
                    'children' => ['a' => 'text-gray-800 ml-6 md:ml-0'],
                    'class' => 'text-xl font-semibold tracking-normal',
                ],
                'h4' => [
                    'children' => ['a' => 'text-gray-800 ml-6 md:ml-0'],
                    'class' => 'text-lg font-semibold tracking-normal',
                ],
            ],
        ];
    }

    public static function extension(): ExtensionInterface
    {
        return new AutolinkExtension();
    }
}
