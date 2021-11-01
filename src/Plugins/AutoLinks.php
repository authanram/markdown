<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\ExtensionInterface;

class AutoLinks extends Plugin
{
    public static function extension(): ExtensionInterface
    {
        return new AutolinkExtension();
    }
}
