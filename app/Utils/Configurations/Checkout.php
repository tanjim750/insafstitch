<?php

namespace App\Utils\Configurations;

final class Checkout
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
        $path = base_path('utils/configurations/checkout/theme.php');
        $config = is_file($path) ? require $path : [];

        if (!isset($config['themes']['modern-neutral']) || !is_array($config['themes']['modern-neutral'])) {
            throw new \RuntimeException('The checkout theme configuration is invalid.');
        }

        return $config;
    }
}
