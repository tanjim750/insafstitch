<?php

namespace App\Services\Landing\Components;

final class SeedMobileWhyGrowV1 extends SeedMobileChecklistV1
{
    protected function componentKey(): string
    {
        return 'seed-mobile-why-grow-v1';
    }

    protected function componentName(): string
    {
        return 'Mobile Benefits Checklist';
    }
}
