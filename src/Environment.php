<?php

declare(strict_types=1);

namespace Authanram\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Environment\Environment as LeagueEnvironment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

class Environment
{
    public static function create(array $config): EnvironmentBuilderInterface
    {
        Assert::url($config['base_url'] ?? '');

        Assert::allSubclassOf($config['plugins'] ?? [], Plugin::class);

        $environment = new LeagueEnvironment(self::mergeConfig($config));

        return static::addExtensions($environment, $config['plugins']);
    }

    private static function mergeConfig(array $config): array
    {
        $configNew = [];

        /** @var Plugin $plugin */
        foreach ($config['plugins'] as $plugin) {
            $configNew = $plugin::config($config);
        }

        return $configNew;
    }

    private static function addExtensions(
        EnvironmentBuilderInterface $environment,
        array $plugins,
    ): EnvironmentBuilderInterface {
        $environment = $environment->addExtension(new CommonMarkCoreExtension());

        /** @var Plugin $plugin */
        foreach ($plugins as $plugin) {
            $environment = $environment->addExtension($plugin::extension());
        }

        return $environment;
    }
}
