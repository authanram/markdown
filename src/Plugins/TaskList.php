<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\TaskList\TaskListExtension;

class TaskList extends Plugin
{
    public static function extension(): ExtensionInterface
    {
        return new TaskListExtension();
    }
}
