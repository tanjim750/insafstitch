<?php

namespace App\Utils\Configurations;

final class Home
{
    public static function theme(): array
    {
        $config = self::configuration();
        $themes = $config['themes'];
        $active = $config['active'] ?? 'street'; // available themes: atelier, noir, street
        $theme = array_merge($themes['atelier'], $themes[$active] ?? []);

        return array_merge([
            'surface_muted' => $theme['surface_alt'],
            'text_secondary' => $theme['muted'],
            'text_muted' => $theme['muted'],
            'primary' => $theme['accent'],
            'primary_hover' => $theme['accent_hover'],
            'primary_text' => '#ffffff',
            'accent_soft' => $theme['surface_alt'],
        ], $theme);
    }

    private static function configuration(): array
    {
        $path = base_path('utils/configurations/home/theme.php');
        $config = is_file($path) ? require $path : [];

        if (!isset($config['themes']['atelier']) || !is_array($config['themes']['atelier'])) {
            throw new \RuntimeException('The homepage theme configuration is invalid.');
        }

        return $config;
    }
}
