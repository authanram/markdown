<?php

declare(strict_types=1);

namespace Authanram\Markdown\Extensions\HeadingAnchors;

use Illuminate\Support\Str;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Node\Query;

final class ApplyHeadingAnchorsProcessor
{
    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $iterator = (new Query())->where(Query::type(Heading::class))
            ->findAll($event->getDocument());

        /** @var Heading $node */
        foreach ($iterator as $node) {
            $node->data->set(
                'attributes.id',
                (string)Str::of($node->firstChild()?->getLiteral())->kebab(),
            );
        }
    }
}
