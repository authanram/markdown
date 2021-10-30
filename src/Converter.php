<?php

declare(strict_types=1);

namespace Authanram\Markdown;

use League\CommonMark\MarkdownConverter;

class Converter
{
    private MarkdownConverter $markdownConverter;

    /** @param array<string> $config */
    public function __construct(array $config)
    {
        static::authorize($config);

        $environment = Environment::create($config);

        $this->markdownConverter = new MarkdownConverter($environment);
    }

    public function with(string $markdown): Document
    {
        $renderedContent = $this->markdownConverter->convertToHtml($markdown);

        return new Document($renderedContent);
    }

    /** @param array<string> $config */
    private static function authorize(array $config): void
    {
        Assert::url($config['base_url'] ?? '');

        Assert::allSubclassOf($config['plugins'] ?? [], Plugin::class);
    }
}
