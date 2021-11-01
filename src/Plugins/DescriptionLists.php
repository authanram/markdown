<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\DescriptionList\DescriptionListExtension;
use League\CommonMark\Extension\ExtensionInterface;

class DescriptionLists extends Plugin
{
    public static function extension(): ExtensionInterface
    {
        return new DescriptionListExtension();
    }
}
