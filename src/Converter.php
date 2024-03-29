<?php

declare(strict_types=1);

namespace Authanram\Markdown;

use Generator;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Environment\EnvironmentInterface;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter as WithFrontMatter;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Node\Block\Document;
use League\CommonMark\Node\Query;
use League\CommonMark\Output\RenderedContentInterface;

class Converter extends MarkdownConverter
{
    private RenderedContentInterface $renderedContent;

    /**
     * @param array<string> $config
     *
     * @noinspection PhpDocSignatureIsNotCompleteInspection
     */
    public function __construct(array $config)
    {
        $config = array_merge_recursive(
            (array)require __DIR__.'/../src/config.php',
            ['converter' => $config],
        );

        static::assert($config['converter']);

        $environment = $this->addPlugins(
            new Environment($this->mergePluginConfigs($config['converter'])),
            $config['converter']['plugins'],
        );

        parent::__construct($environment);
    }

    public function withMarkdown(string $markdown): self
    {
        $this->renderedContent = $this->convert($markdown);

        return $this;
    }

    public function getDocument(): Document
    {
        return $this->renderedContent->getDocument();
    }

    /** @return array<string>|null */
    public function getFrontMatter(): array|null
    {
        return $this->renderedContent instanceof WithFrontMatter
            ? $this->renderedContent->getFrontMatter()
            : null;
    }

    public function getHome(): string
    {
        $home = $this->getFrontMatter()['home'] ?? null;

        Assert::stringNotEmpty($home, 'Front Matter [home] must not be empty.');

        return $home;
    }

    /** @return array<string> */
    public function getIndex(): array
    {
        return $this->getFrontMatter()['index'] ?? [];
    }

    public function getBanner(): string|null
    {
        return $this->getFrontMatter()['banner'] ?? null;
    }

    public function getTitle(): string|null
    {
        return $this->getFrontMatter()['title'] ?? null;
    }

    public function toHtml(array $replace = []): string
    {
        $html = $this->renderedContent->getContent();

        foreach ($replace as $searchFor => $replaceWith) {
            $html = str_replace($searchFor, $replaceWith, $html);
        }

        return $html;
    }

    public function query(): Query
    {
        return new Query;
    }

    public function map(Generator $iterator, callable $callback)
    {
        return array_map($callback, iterator_to_array($iterator));
    }

    /**
     * @param array<string> $config
     *
     * @return array<string>
     */
    private function mergePluginConfigs(array $config): array
    {
        $pluginConfig = [];

        /** @var Plugin $plugin */
        foreach ($config['plugins'] as $plugin) {
            $pluginConfig[] = $plugin::config($config);
        }

        return array_merge(...$pluginConfig);
    }

    /**
     * @param array<string> $plugins
     *
     * @noinspection PhpDocSignatureIsNotCompleteInspection
     */
    private function addPlugins(
        EnvironmentBuilderInterface|EnvironmentInterface $environment,
        array $plugins,
    ): EnvironmentInterface {
        $environment->addExtension(new CommonMarkCoreExtension());

        /** @var Plugin $plugin */
        foreach ($plugins as $plugin) {
            $environment->addExtension($plugin::extension());
        }

        return $environment;
    }

    /** @param array<string> $config */
    private static function assert(array $config): void
    {
        Assert::url($config['base_url'] ?? '');

        Assert::allSubclassOf($config['plugins'] ?? [], Plugin::class);
    }
}
