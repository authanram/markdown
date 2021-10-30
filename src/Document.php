<?php

declare(strict_types=1);

namespace Authanram\Markdown;

use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter as WithFrontMatter;
use League\CommonMark\Node\Block\Document as LeagueDocument;
use League\CommonMark\Output\RenderedContentInterface as RenderedContent;

class Document
{
    public function __construct(private RenderedContent $renderedContent)
    {
    }

    public function getDocument(): LeagueDocument
    {
        return $this->getRenderedContent()->getDocument();
    }

    public function getFrontMatter(): array
    {
        return $this->getRenderedContent()->getFrontMatter() ?? [];
    }

    public function getHtml(): string
    {
        return $this->getRenderedContent()->getContent();
    }

    public function getIndex(): array
    {
        return $this->getFrontMatter()['index'] ?? [];
    }

    private function getRenderedContent(): RenderedContent|WithFrontMatter
    {
        return $this->renderedContent;
    }
}
