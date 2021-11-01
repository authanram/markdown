<?php

declare(strict_types=1);

namespace Authanram\Markdown\Extensions\SvgIcons;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Event\DocumentRenderedEvent;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;

final class SvgIconsExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('svg_icons', Expect::array()
            ->required()
            ->default([]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, [
            new ApplySvgIconsProcessor(),
            'onDocumentParsed',
        ]);

        $environment->addEventListener(DocumentRenderedEvent::class, [
            new SvgIconsInlineRenderer(),
            'onDocumentRendered',
        ]);
    }
}
