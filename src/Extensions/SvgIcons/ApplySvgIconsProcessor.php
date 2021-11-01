<?php

declare(strict_types=1);

namespace Authanram\Markdown\Extensions\SvgIcons;

use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\CommonMark\Node\Block\BlockQuote;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Node\Query;

final class ApplySvgIconsProcessor
{
    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
        $iterator = (new Query)->where(Query::type(BlockQuote::class))
            ->findAll($event->getDocument());

        /** @var BlockQuote $blockquote */
        foreach ($iterator as $blockquote) {
            $subject = $blockquote->firstChild()?->firstChild();

            if ($subject instanceof Text === false) {
                continue;
            }

            preg_match('/{icon:(.*?)}/i', $subject->getLiteral(), $match);

            if (count($match) === 0) {
                continue;
            }

            $subject->setLiteral(str_replace(
                $match[0].' ',
                '',
                $subject->getLiteral(),
            ));

            $text = new Text();
            $text->setLiteral($match[0]);

            $blockquote->prependChild($text);
        }
    }
}
