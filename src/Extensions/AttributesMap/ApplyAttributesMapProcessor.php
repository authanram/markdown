<?php

declare(strict_types=1);

namespace Authanram\Markdown\Extensions\AttributesMap;

use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Node\Query;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class ApplyAttributesMapProcessor implements ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $map = $this->config->get('attributes_map');

        if (is_array($map) === false || count($map) === 0) {
            return;
        }

        (new Query)->where();

        dd($event->getDocument()->firstChild());

        $event->getDocument();

        $event->getDocument();
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }
}
