<?php

declare(strict_types=1);

namespace Authanram\Markdown;

use League\CommonMark\Extension\ExtensionInterface;

abstract class Plugin
{
    abstract public static function extension(): ExtensionInterface;

    public static function config(array $config): array
    {
        return [];
    }
}
