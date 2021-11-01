<?php

declare(strict_types=1);

namespace Authanram\Markdown\Extensions\HeadingAnchors;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;

final class HeadingAnchorsExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, [
            new ApplyHeadingAnchorsProcessor(),
            'onDocumentParsed',
        ]);
    }
}
