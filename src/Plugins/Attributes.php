<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\ExtensionInterface;

class Attributes extends Plugin
{
    public static function extension(): ExtensionInterface
    {
        return new AttributesExtension();
    }
}
