<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Extensions\AttributesMap\AttributesMapExtension;
use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\ExtensionInterface;

class AttributesMap extends Plugin
{
    public static function extension(): ExtensionInterface
    {
        return new AttributesMapExtension();
    }
}
