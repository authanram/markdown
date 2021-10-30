<?php

declare(strict_types=1);

namespace Authanram\Markdown\Plugins;

use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;
use League\CommonMark\Extension\ExtensionInterface;

//use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
//use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
//use League\CommonMark\Extension\Table\Table;
//use League\CommonMark\Node\Block\Paragraph;


class DefaultAttributes extends Plugin
{
    public static function config(array $config): array
    {
        return [
            'default_attributes' => [
//                Heading::class => [
//                    'class' => static function (Heading $node) {
//                        if ($node->getLevel() === 1) {
//                            return 'title-main';
//                        }
//
//                        return null;
//                    },
//                ],
//                Table::class => [
//                    'class' => 'table',
//                ],
//                Paragraph::class => [
//                    'class' => ['text-center', 'font-comic-sans'],
//                ],
//                Link::class => [
//                    'class' => 'btn btn-link',
//                    'target' => '_blank',
//                ],
            ],
        ];
    }

    public static function extension(): ExtensionInterface
    {
        return new DefaultAttributesExtension();
    }
}
