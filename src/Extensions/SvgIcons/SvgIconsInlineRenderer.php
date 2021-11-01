<?php

declare(strict_types=1);

namespace Authanram\Markdown\Extensions\SvgIcons;

use League\CommonMark\Event\DocumentRenderedEvent;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class SvgIconsInlineRenderer implements ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function onDocumentRendered(DocumentRenderedEvent $event): void
    {
        $content = $event->getOutput()->getContent();

        preg_match_all('/{icon:(.*?)}/i', $content, $matches);

        if (count($matches) === 0) {
            return;
        }

        foreach ($matches[1] as $icon) {
            $svg = $this->svgIcon($icon);

            if (is_null($svg)) {
                continue;
            }

            $content = str_replace(
                '{icon:'.$icon.'}',
                '<div class="svg-icon icon-'.$icon.'">'.$svg.'</div>',
                $content,
            );
        }

        $output = new SvgIconsRenderedContent(
            $event->getOutput()->getDocument(),
            $content,
        );

        $event->replaceOutput($output);
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    private function svgIcon(string $icon): string|null
    {
        return $this->config->get('svg_icons')[$icon] ?? null;
    }
}
