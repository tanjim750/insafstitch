<?php

namespace App\Services\Landing\Components;

final class Bari12StaticSection extends BaseLandingComponent
{
    public function __construct(
        private string $componentKey,
        private string $componentName,
        private string $componentView,
        private array $componentSchema,
        private array $componentDefaults,
        private ?string $componentCategory = null
    ) {
    }

    public function key(): string
    {
        return $this->componentKey;
    }

    public function name(): string
    {
        return $this->componentName;
    }

    public function category(): string
    {
        if ($this->componentCategory) {
            return $this->componentCategory;
        }

        return match (true) {
            str_contains($this->componentKey, 'hero') => 'Heroes',
            str_contains($this->componentKey, 'gallery'), str_contains($this->componentKey, 'image') => 'Media & Galleries',
            str_contains($this->componentKey, 'checkout') => 'Checkout',
            str_contains($this->componentKey, 'footer') => 'Footers',
            str_contains($this->componentKey, 'whatsapp'), str_contains($this->componentKey, 'contact') => 'Contact & Support',
            str_contains($this->componentKey, 'cta'), str_contains($this->componentKey, 'floating') => 'Calls to Action',
            str_contains($this->componentKey, 'trust'), str_contains($this->componentKey, 'testimonial') => 'Trust & Testimonials',
            str_contains($this->componentKey, 'benefit'), str_contains($this->componentKey, 'feature'), str_contains($this->componentKey, 'why-us') => 'Benefits & Features',
            str_contains($this->componentKey, 'countdown'), str_contains($this->componentKey, 'offer') => 'Offers & Countdowns',
            str_contains($this->componentKey, 'banner') => 'Navigation & Banners',
            default => 'General',
        };
    }

    public function view(): string
    {
        return $this->componentView;
    }

    public function schema(): array
    {
        return array_merge($this->componentSchema, [
            'style' => array_merge(
                $this->commonStyleSchema(),
                $this->componentSchema['style'] ?? []
            ),
        ]);
    }

    public function defaults(): array
    {
        return $this->componentDefaults;
    }

    public function behaviours(): array
    {
        return $this->componentDefaults['behaviours'] ?? [];
    }

    public function validationRules(): array
    {
        return [
            'content' => ['required', 'array'],
            'style' => ['required', 'array'],
            'style.*' => [$this->styleValueRule()],
            'settings' => ['nullable', 'array'],
            'behaviours' => ['nullable', 'array'],
            'data_source' => ['nullable', 'array'],
        ];
    }
}
