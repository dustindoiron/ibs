<?php

namespace IBS;

class Configuration
{
    public const CONFIGURATION_DEFAULTS = [
        'ResponseFormat' => 'json',
    ];

    public const IBS_PRODUCTION_ENDPOINT_DEFAULT = 'https://api.internet.bs/';

    private array $configuration = [];

    public static function createFromArray(array $configArray): Configuration
    {
        $configuration = new self();
        $configuration->setConfiguration(
            array_merge($configArray, self::CONFIGURATION_DEFAULTS)
        );
        return $configuration;
    }

    public function setConfiguration(array $configuration): void
    {
        $this->configuration = $configuration;
    }

    public function getKey(string $key): string
    {
        return $this->getConfiguration($key);
    }

    public function getConfiguration(string $key = ''): array|string
    {
        if ($key) {
            return $this->configuration[$key];
        }

        return $this->configuration;
    }
}