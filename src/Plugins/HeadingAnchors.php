<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Extensions\HeadingAnchors\HeadingAnchorsExtension;
use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\ExtensionInterface;

class HeadingAnchors extends Plugin
{
    public static function extension(): ExtensionInterface
    {
        return new HeadingAnchorsExtension();
    }
}
