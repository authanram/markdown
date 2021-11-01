<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Extensions\SvgIcons\SvgIconsExtension;
use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\ExtensionInterface;

class SvgIcons extends Plugin
{
    public static function config(array $config): array
    {
        return [
            'svg_icons' => [
                'note' => '<svg class="svg-icon icon-note" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M 13 4 L 13 20 L 19 20 L 19 4 Z M 15 6 L 17 6 L 17 18 L 15 18 Z M 13 22 L 13 28 L 19 28 L 19 22 Z M 15 24 L 17 24 L 17 26 L 15 26 Z"></path></svg>',
                'play' => '<svg class="svg-icon icon-play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 12 9.125 L 12 22.875 L 13.5 22 L 22.5 16.875 L 24 16 L 22.5 15.125 L 13.5 10 Z M 14 12.5625 L 19.96875 16 L 14 19.4375 Z"></path></svg>',
                'tip' => '<svg class="svg-icon icon-tip" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet" fill="currentColor"><path d="M18,2.25a11,11,0,0,0-11,11,10.68,10.68,0,0,0,1,4.63,16.36,16.36,0,0,0,1.12,1.78,17,17,0,0,1,2,3.47,16.19,16.19,0,0,1,.59,4h2A18.17,18.17,0,0,0,13,22.44a18.46,18.46,0,0,0-2.22-3.92,15.79,15.79,0,0,1-1-1.54A8.64,8.64,0,0,1,9,13.23a9,9,0,0,1,18.07,0A8.64,8.64,0,0,1,26.21,17a15.79,15.79,0,0,1-1,1.54A18.46,18.46,0,0,0,23,22.44a18.17,18.17,0,0,0-.71,4.71h2a16.19,16.19,0,0,1,.59-4,17,17,0,0,1,2-3.47A16.31,16.31,0,0,0,28,17.86a10.68,10.68,0,0,0,1-4.63A11,11,0,0,0,18,2.25Z"></path><path d="M18.63,15.51a.8.8,0,0,0-1.13,0l-3,3,2.86,3.13v5.54H19V21l-2.24-2.45,1.89-1.89A.8.8,0,0,0,18.63,15.51Z"></path><path d="M23.86,29.15H12.11a.8.8,0,1,0,0,1.6H23.86a.8.8,0,0,0,0-1.6Z"></path><path d="M22,32.15H14a.8.8,0,1,0,0,1.6H22a.8.8,0,1,0,0-1.6Z"></path><path d="M17.32,10.89l-2.73,2.73a.8.8,0,0,0,1.13,1.13L18.45,12a.8.8,0,1,0-1.13-1.13Z"></path><rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect></svg>',
            ],
        ];
    }

    public static function extension(): ExtensionInterface
    {
        return new SvgIconsExtension();
    }
}
