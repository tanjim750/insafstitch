<?php

namespace App\Utils\Configurations;

final class Product
{
    public static function theme(): array
    {
        $config = self::configuration();
        $themes = $config['themes'];
        $active = $config['active'] ?? 'modern-neutral';

        return array_merge($themes['modern-neutral'], $themes[$active] ?? []);
    }

    private static function configuration(): array
    {
        $path = base_path('utils/configurations/product/theme.php');
        $config = is_file($path) ? require $path : [];

        if (!isset($config['themes']['modern-neutral']) || !is_array($config['themes']['modern-neutral'])) {
            throw new \RuntimeException('The product theme configuration is invalid.');
        }

        return $config;
    }
}
