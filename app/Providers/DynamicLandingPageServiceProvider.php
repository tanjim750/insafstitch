<?php

namespace App\Providers;

use App\Services\Landing\Actions\AddDynamicLandingPageComponent;
use App\Services\Landing\Actions\DeleteDynamicLandingPageComponent;
use App\Services\Landing\Actions\DuplicateDynamicLandingPageComponent;
use App\Services\Landing\Actions\ReorderDynamicLandingPageComponents;
use App\Services\Landing\Actions\SetDynamicLandingPageComponentVisibility;
use App\Services\Landing\Actions\SubmitLandingOrderAction;
use App\Services\Landing\Actions\UpdateDynamicLandingPageComponentConfig;
use App\Services\Landing\Components\Bari12CheckoutFormV1;
use App\Services\Landing\Components\Bari12StaticSection;
use App\Services\Landing\Components\HeroCountdownV1;
use App\Services\Landing\Components\ProductGridV1;
use App\Services\Landing\Components\SeedBenefitsV1;
use App\Services\Landing\Components\SeedCheckoutV1;
use App\Services\Landing\Components\SeedCheckoutV2;
use App\Services\Landing\Components\SeedFooterV1;
use App\Services\Landing\Components\SeedGalleryV1;
use App\Services\Landing\Components\SeedMobileCheckoutStickyV1;
use App\Services\Landing\Components\SeedMobileFooterV1;
use App\Services\Landing\Components\SeedMobileGalleryV1;
use App\Services\Landing\Components\SeedMobileOfferCountdownV1;
use App\Services\Landing\Components\SeedMobileTrustHeroV1;
use App\Services\Landing\Components\SeedMobileWhyBuyV1;
use App\Services\Landing\Components\SeedMobileWhyGrowV1;
use App\Services\Landing\Components\SeedOfferHeroV1;
use App\Services\Landing\Components\SeedSupportV1;
use App\Services\Landing\Components\SheikhSeedsCheckoutFormV1;
use App\Services\Landing\DataResolvers\ProductGridResolver;
use App\Services\Landing\LandingComponentConfigResolver;
use App\Services\Landing\LandingComponentConfigService;
use App\Services\Landing\LandingComponentConfigValidator;
use App\Services\Landing\LandingComponentDataResolverRegistry;
use App\Services\Landing\LandingComponentDataService;
use App\Services\Landing\LandingComponentDefaultConfigNormalizer;
use App\Services\Landing\LandingComponentRenderer;
use App\Services\Landing\LandingComponentRegistry;
use App\Services\Landing\LandingPageRenderer;
use App\Services\Landing\LandingPagePublicationService;
use App\Services\Landing\LandingPageSnapshotBuilder;
use App\Services\Landing\LandingPublishedPageCache;
use App\Services\Landing\LandingRenderSupport;
use App\Services\Landing\LandingStyleResolver;
use App\Services\Landing\LandingTheme;
use App\Services\Landing\LandingTransactionalActionRegistry;
use App\Services\Landing\LandingTransactionalActionService;
use Illuminate\Support\ServiceProvider;

class DynamicLandingPageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LandingComponentRegistry::class, function () {
            $registry = new LandingComponentRegistry();

            $registry->register(app(HeroCountdownV1::class));
            $registry->register(app(ProductGridV1::class));
            $registry->register(app(SeedOfferHeroV1::class));
            $registry->register(app(SeedBenefitsV1::class));
            $registry->register(app(SeedGalleryV1::class));
            $registry->register(app(SeedCheckoutV1::class));
            $registry->register(app(SeedCheckoutV2::class));
            $registry->register(app(SeedSupportV1::class));
            $registry->register(app(SeedFooterV1::class));
            $registry->register(app(SeedMobileTrustHeroV1::class));
            $registry->register(app(SeedMobileOfferCountdownV1::class));
            $registry->register(app(SeedMobileWhyGrowV1::class));
            $registry->register(app(SeedMobileGalleryV1::class));
            $registry->register(app(SeedMobileWhyBuyV1::class));
            $registry->register(app(SeedMobileCheckoutStickyV1::class));
            $registry->register(app(SeedMobileFooterV1::class));
            $registry->register(new Bari12StaticSection(
                'bari12-top-banner-v1',
                'Announcement Banner',
                'landing.components.bari12-top-banner-v1',
                [
                    'content' => [
                        'heading' => ['type' => 'text', 'label' => 'Heading'],
                        'subheading' => ['type' => 'textarea', 'label' => 'Subheading'],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'heading_color' => ['type' => 'color', 'label' => 'Heading Color'],
                        'text_color' => ['type' => 'color', 'label' => 'Text Color'],
                        'border_color' => ['type' => 'color', 'label' => 'Border Color'],
                    ],
                    'settings' => [],
                ],
                [
                    'content' => [
                        'heading' => 'বারি বেগুন-১২ বীজ । কেজি বেগুন বীজ । রাখাইন জাতের বেগুন বীজ',
                        'subheading' => 'সস্তায় বস্তা ভরে বীজ না কিনে কোয়ালিটি সম্পূর্ণ বীজ কিনুন। কারণ শখ করে লাগাবেন যদি চারা বা ফলনই না আসে তাহলে টাকা সময় দুইটাই নষ্ট',
                    ],
                    'style' => ['background_color' => '#f2d7d5', 'heading_color' => '#b91c1c', 'text_color' => '#dc2626', 'border_color' => '#ef4444'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-cta-button-v1',
                'Centered CTA',
                'landing.components.bari12-cta-button-v1',
                [
                    'content' => [
                        'label' => ['type' => 'text', 'label' => 'Button Label'],
                        'url' => ['type' => 'url', 'label' => 'Button URL'],
                        'icon' => ['type' => 'text', 'label' => 'Material Icon'],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'button_color' => ['type' => 'color', 'label' => 'Button Color'],
                        'button_top_color' => ['type' => 'color', 'label' => 'Button Top Color'],
                    ],
                    'settings' => [],
                ],
                [
                    'content' => ['label' => 'অফার প্রাইজে অর্ডার করতে এখানে ক্লিক করুন', 'url' => '#order-form', 'icon' => 'shopping_cart'],
                    'style' => ['background_color' => '#ffffff', 'button_color' => '#1d8348', 'button_top_color' => '#28b463'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-hero-image-v1',
                'Image Hero with Heading',
                'landing.components.bari12-hero-image-v1',
                [
                    'content' => [
                        'heading' => ['type' => 'textarea', 'label' => 'Heading'],
                        'image_url' => ['type' => 'url', 'label' => 'Image URL'],
                        'image_alt' => ['type' => 'text', 'label' => 'Image Alt Text'],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'card_background' => ['type' => 'color', 'label' => 'Heading Card Background'],
                        'heading_color' => ['type' => 'color', 'label' => 'Heading Color'],
                    ],
                    'settings' => [],
                ],
                [
                    'content' => [
                        'heading' => "বারি -12 বা কেজি বেগুনের বীজ এর সাথে ফ্রী বারোমাসি\nশসার বিজ",
                        'image_url' => '/images/no_found.png',
                        'image_alt' => 'Bari-12 Eggplant and Cucumber Seeds Offer',
                    ],
                    'style' => ['background_color' => '#ffffff', 'card_background' => '#f9ebea', 'heading_color' => '#b91c1c'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-trust-banner-v1',
                'Trust Banner',
                'landing.components.bari12-trust-banner-v1',
                [
                    'content' => ['text' => ['type' => 'text', 'label' => 'Text']],
                    'style' => ['background_color' => ['type' => 'color', 'label' => 'Background Color']],
                    'settings' => [],
                ],
                [
                    'content' => ['text' => 'আপনি আমার পণ্য নিয়ে জিতলেই আমি জিতবো "ইনশাআল্লাহ"'],
                    'style' => ['background_color' => '#22c55e'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-benefit-checklist-v1',
                'Benefit Checklist',
                'landing.components.bari12-benefit-checklist-v1',
                [
                    'content' => [
                        'heading' => ['type' => 'text', 'label' => 'Heading'],
                        'items' => ['type' => 'repeater', 'label' => 'Checklist Items', 'fields' => ['text']],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'title_background' => ['type' => 'color', 'label' => 'Title Background'],
                        'heading_color' => ['type' => 'color', 'label' => 'Heading Color'],
                        'check_color' => ['type' => 'color', 'label' => 'Check Color'],
                    ],
                    'settings' => [],
                ],
                [
                    'content' => [
                        'heading' => '',
                        'items' => [],
                    ],
                    'style' => ['background_color' => '#f0fdf4', 'title_background' => '#fcf3cf', 'heading_color' => '#145a32', 'check_color' => '#dc2626'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-offer-details-v1',
                'Offer Details with Countdown',
                'landing.components.bari12-offer-details-v1',
                [
                    'content' => [
                        'heading' => ['type' => 'text', 'label' => 'Heading, use {gift} placeholder'],
                        'gift_text' => ['type' => 'text', 'label' => 'Gift Text'],
                        'limited_text' => ['type' => 'text', 'label' => 'Limited Text'],
                        'red_heading' => ['type' => 'text', 'label' => 'Red Heading'],
                        'blue_heading' => ['type' => 'text', 'label' => 'Blue Heading'],
                        'regular_price' => ['type' => 'text', 'label' => 'Regular Price'],
                        'offer_label' => ['type' => 'text', 'label' => 'Offer Label'],
                        'offer_price' => ['type' => 'text', 'label' => 'Offer Price'],
                        'countdown' => ['type' => 'repeater', 'label' => 'Countdown Units'],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'accent_color' => ['type' => 'color', 'label' => 'Accent Color'],
                        'countdown_color' => ['type' => 'color', 'label' => 'Countdown Color'],
                    ],
                    'settings' => [
                        'countdown.duration_hours' => ['type' => 'number', 'label' => 'Countdown Hours', 'min' => 1],
                        'countdown.starts_at' => ['type' => 'datetime', 'label' => 'Starts At'],
                    ],
                ],
                [
                    'content' => [
                        'heading' => 'ডেলিভারি চার্জ ফ্রী এবং গিফট হিসেবে পাচ্ছেন {gift}',
                        'gift_text' => 'বারোমাসি শসা বীজ',
                        'limited_text' => '- সীমিত সময়ের জন্য -',
                        'red_heading' => 'অফারটি সীমিত সময়ের জন্য',
                        'blue_heading' => 'বিজ না গজালে টাকা ফেরত পাবেন ইনশাআল্লাহ',
                        'regular_price' => '৪০০/-',
                        'offer_label' => 'আজকের অফার মূল্য মাত্র',
                        'offer_price' => '৩০০/-',
                        'countdown' => [
                            ['value' => '00', 'label' => 'Days'],
                            ['value' => '03', 'label' => 'Hours'],
                            ['value' => '47', 'label' => 'Minutes'],
                            ['value' => '12', 'label' => 'Seconds'],
                        ],
                    ],
                    'style' => ['background_color' => '#e6b0aa', 'accent_color' => '#15803d', 'countdown_color' => '#e74c3c'],
                    'settings' => [
                        'countdown' => [
                            'duration_hours' => 4,
                            'starts_at' => null,
                        ],
                    ],
                    'behaviours' => ['recurring-countdown'],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-gallery-v1',
                'Compact Image Gallery',
                'landing.components.bari12-gallery-v1',
                [
                    'content' => [
                        'heading' => ['type' => 'text', 'label' => 'Heading'],
                        'images' => ['type' => 'repeater', 'label' => 'Images'],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'image_border_color' => ['type' => 'color', 'label' => 'Image Border Color'],
                    ],
                    'settings' => [
                        'columns' => ['type' => 'number', 'label' => 'Columns', 'min' => 1],
                    ],
                ],
                [
                    'content' => [
                        'heading' => 'বারি বেগুন-১২ এর কিছু ছবি',
                        'images' => [
                            ['url' => '/images/no_found.png', 'alt' => 'Eggplant Gallery 1'],
                            ['url' => '/images/no_found.png', 'alt' => 'Eggplant Gallery 2'],
                            ['url' => '/images/no_found.png', 'alt' => 'Eggplant Gallery 3'],
                            ['url' => '/images/no_found.png', 'alt' => 'Eggplant Gallery 4'],
                        ],
                    ],
                    'style' => ['background_color' => '#f7fef9', 'image_border_color' => '#3b82f6'],
                    'settings' => ['columns' => 2],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-why-us-v1',
                'Why Choose Us',
                'landing.components.bari12-why-us-v1',
                [
                    'content' => [
                        'heading' => ['type' => 'text', 'label' => 'Heading'],
                        'items' => ['type' => 'repeater', 'label' => 'Checklist Items', 'fields' => ['text']],
                        'button_text' => ['type' => 'text', 'label' => 'Button Text'],
                        'button_url' => ['type' => 'url', 'label' => 'Button URL'],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'heading_color' => ['type' => 'color', 'label' => 'Heading Color'],
                        'check_color' => ['type' => 'color', 'label' => 'Check Color'],
                        'button_color' => ['type' => 'color', 'label' => 'Button Color'],
                        'button_top_color' => ['type' => 'color', 'label' => 'Button Top Color'],
                    ],
                    'settings' => [],
                ],
                [
                    'content' => [
                        'heading' => '',
                        'items' => [],
                        'button_text' => '',
                        'button_url' => '',
                    ],
                    'style' => ['background_color' => '#e8f8f5', 'heading_color' => '#7f1d1d', 'check_color' => '#7f1d1d', 'button_color' => '#1d8348', 'button_top_color' => '#28b463'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-whatsapp-contact-v1',
                'Messaging Contact CTA',
                'landing.components.bari12-whatsapp-contact-v1',
                [
                    'content' => [
                        'heading' => ['type' => 'text', 'label' => 'Heading'],
                        'label' => ['type' => 'text', 'label' => 'Button Label'],
                        'url' => ['type' => 'url', 'label' => 'Button URL'],
                        'icon' => ['type' => 'text', 'label' => 'Icon'],
                    ],
                    'style' => [
                        'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                        'heading_color' => ['type' => 'color', 'label' => 'Heading Color'],
                        'button_color' => ['type' => 'color', 'label' => 'Button Color'],
                    ],
                    'settings' => [],
                ],
                [
                    'content' => ['heading' => 'প্রয়োজনে হোয়াটসআপ করুনঃ 01897926161', 'label' => '01897926161', 'url' => 'https://wa.me/8801897926161', 'icon' => 'chat'],
                    'style' => ['background_color' => '#f9ebea', 'heading_color' => '#7f1d1d', 'button_color' => '#6c3453'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(app(Bari12CheckoutFormV1::class));
            $registry->register(new Bari12StaticSection(
                'bari12-footer-v1',
                'Simple Footer',
                'landing.components.bari12-footer-v1',
                [
                    'content' => ['text' => ['type' => 'text', 'label' => 'Footer Text']],
                    'style' => ['background_color' => ['type' => 'color', 'label' => 'Background Color']],
                    'settings' => [],
                ],
                [
                    'content' => ['text' => '© 2024 trizync-solution. All Rights Reserved.'],
                    'style' => ['background_color' => '#000000'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $registry->register(new Bari12StaticSection(
                'bari12-floating-whatsapp-v1',
                'Floating Contact Button',
                'landing.components.bari12-floating-whatsapp-v1',
                [
                    'content' => [
                        'label' => ['type' => 'text', 'label' => 'Label'],
                        'url' => ['type' => 'url', 'label' => 'URL'],
                        'icon' => ['type' => 'text', 'label' => 'Icon'],
                    ],
                    'style' => ['button_color' => ['type' => 'color', 'label' => 'Button Color']],
                    'settings' => [],
                ],
                [
                    'content' => ['label' => 'কিছু জানার থাকলে দিন', 'url' => 'https://wa.me/8801897926161', 'icon' => 'chat'],
                    'style' => ['button_color' => '#dc2626'],
                    'settings' => [],
                    'behaviours' => [],
                    'data_source' => [],
                ]
            ));
            $this->registerSheikhSeedsComponents($registry);

            return $registry;
        });

        $this->app->singleton(LandingComponentDataResolverRegistry::class, function () {
            $registry = new LandingComponentDataResolverRegistry();

            $registry->register('product-grid', ProductGridResolver::class);

            return $registry;
        });

        $this->app->singleton(LandingTransactionalActionRegistry::class, function () {
            $registry = new LandingTransactionalActionRegistry();

            $registry->register('order-submission', SubmitLandingOrderAction::class);

            return $registry;
        });

        $this->app->singleton(LandingComponentDefaultConfigNormalizer::class);
        $this->app->singleton(LandingComponentConfigResolver::class);
        $this->app->singleton(LandingComponentConfigValidator::class);
        $this->app->singleton(LandingComponentConfigService::class);
        $this->app->singleton(LandingComponentDataService::class);
        $this->app->singleton(LandingTheme::class);
        $this->app->singleton(LandingStyleResolver::class);
        $this->app->singleton(LandingRenderSupport::class);
        $this->app->singleton(LandingComponentRenderer::class);
        $this->app->singleton(LandingPageRenderer::class);
        $this->app->singleton(LandingPageSnapshotBuilder::class);
        $this->app->singleton(LandingPublishedPageCache::class);
        $this->app->singleton(LandingPagePublicationService::class);
        $this->app->singleton(LandingTransactionalActionService::class);
        $this->app->singleton(AddDynamicLandingPageComponent::class);
        $this->app->singleton(UpdateDynamicLandingPageComponentConfig::class);
        $this->app->singleton(ReorderDynamicLandingPageComponents::class);
        $this->app->singleton(DuplicateDynamicLandingPageComponent::class);
        $this->app->singleton(SetDynamicLandingPageComponentVisibility::class);
        $this->app->singleton(DeleteDynamicLandingPageComponent::class);
        $this->app->singleton(SubmitLandingOrderAction::class);
    }

    private function registerSheikhSeedsComponents(LandingComponentRegistry $registry): void
    {
        $category = null;
        $ctaContent = [
            'label' => 'অফার প্রাইজে অর্ডার করতে এখানে ক্লিক করুন',
            'url' => '#trizync-solution-checkout-form',
        ];
        $ctaStyle = [
            'background_color' => '#ffffff',
            'button_color' => '#22734e',
            'button_text_color' => '#ffffff',
        ];

        $registry->register(new Bari12StaticSection(
            'sheikh-hero-header-v1',
            'Promotional Hero',
            'landing.components.sheikh-hero-header-v1',
            [
                'content' => [
                    'kicker' => ['type' => 'text', 'label' => 'Kicker'],
                    'heading' => ['type' => 'text', 'label' => 'Heading'],
                    'old_price' => ['type' => 'text', 'label' => 'Old Price'],
                    'price' => ['type' => 'text', 'label' => 'Offer Price'],
                    'delivery_text' => ['type' => 'text', 'label' => 'Delivery Text'],
                    'flags' => ['type' => 'repeater', 'label' => 'Trust Flags'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                    'accent_color' => ['type' => 'color', 'label' => 'Accent Color'],
                    'border_color' => ['type' => 'color', 'label' => 'Border Color'],
                ],
                'settings' => [],
            ],
            [
                'content' => [
                    'kicker' => '২ প্যাকেট উন্নতমানের',
                    'heading' => 'বারি ১২ বেগুনের বীজ',
                    'old_price' => '৫০০ টাকা',
                    'price' => 'মাত্র ২৯৯ টাকা',
                    'delivery_text' => 'সারা দেশে ফ্রি ডেলিভারি',
                    'flags' => [
                        ['text' => 'সীমিত সময়ের অফার', 'color' => '#ef4444'],
                        ['text' => 'বিশ্বস্ত মান', 'color' => '#22c55e'],
                    ],
                ],
                'style' => ['background_color' => '#14532d', 'accent_color' => '#facc15', 'border_color' => '#22c55e'],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));

        $registry->register(new Bari12StaticSection(
            'sheikh-cta-button-v1',
            'Full-Width CTA',
            'landing.components.sheikh-cta-button-v1',
            [
                'content' => [
                    'label' => ['type' => 'text', 'label' => 'Button Label'],
                    'url' => ['type' => 'url', 'label' => 'Button URL'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                    'button_color' => ['type' => 'color', 'label' => 'Button Color'],
                    'button_text_color' => ['type' => 'color', 'label' => 'Button Text Color'],
                ],
                'settings' => [],
            ],
            ['content' => $ctaContent, 'style' => $ctaStyle, 'settings' => [], 'behaviours' => [], 'data_source' => []],
            $category
        ));

        $registry->register(new Bari12StaticSection(
            'sheikh-image-collage-v1',
            'Image Collage',
            'landing.components.sheikh-image-collage-v1',
            [
                'content' => [
                    'images' => ['type' => 'repeater', 'label' => 'Images'],
                    'center_image_url' => ['type' => 'url', 'label' => 'Center Image URL'],
                    'center_image_alt' => ['type' => 'text', 'label' => 'Center Image Alt Text'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                ],
                'settings' => [],
            ],
            [
                'content' => [
                    'images' => [
                        ['url' => '/images/no_found.png', 'alt' => 'Farmer in field'],
                        ['url' => '/images/no_found.png', 'alt' => 'Eggplants on vine'],
                        ['url' => '/images/no_found.png', 'alt' => 'Harvested eggplants'],
                        ['url' => '/images/no_found.png', 'alt' => 'Eggplants close up'],
                    ],
                    'center_image_url' => '/images/no_found.png',
                    'center_image_alt' => 'Single eggplant',
                ],
                'style' => ['background_color' => '#dcfce7'],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));

        $listSchema = [
            'content' => [
                'heading' => ['type' => 'text', 'label' => 'Heading'],
                'items' => ['type' => 'repeater', 'label' => 'Items', 'fields' => ['text']],
            ],
            'style' => [
                'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                'card_background' => ['type' => 'color', 'label' => 'Card Background'],
                'heading_background' => ['type' => 'color', 'label' => 'Heading Background'],
                'heading_color' => ['type' => 'color', 'label' => 'Heading Color'],
                'icon_background' => ['type' => 'color', 'label' => 'Icon Background'],
                'check_color' => ['type' => 'color', 'label' => 'Check Color'],
            ],
            'settings' => [],
        ];

        $registry->register(new Bari12StaticSection(
            'sheikh-features-list-v1',
            'Feature List',
            'landing.components.sheikh-features-list-v1',
            $listSchema,
            [
                'content' => ['heading' => '', 'items' => []],
                'style' => ['background_color' => '#ffffff', 'card_background' => '#ffffff', 'heading_background' => '#5b21b6', 'heading_color' => '#ffffff', 'icon_background' => '#f3e8ff', 'check_color' => '#7c3aed'],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));

        $registry->register(new Bari12StaticSection(
            'sheikh-full-width-image-v1',
            'Full-Width Image',
            'landing.components.sheikh-full-width-image-v1',
            [
                'content' => [
                    'image_url' => ['type' => 'url', 'label' => 'Image URL'],
                    'image_alt' => ['type' => 'text', 'label' => 'Image Alt Text'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                ],
                'settings' => [],
            ],
            [
                'content' => ['image_url' => '/images/no_found.png', 'image_alt' => 'Large eggplant field'],
                'style' => ['background_color' => '#ffffff'],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));

        $registry->register(new Bari12StaticSection(
            'sheikh-trust-list-v1',
            'Trust Features',
            'landing.components.sheikh-trust-list-v1',
            $listSchema,
            [
                'content' => [
                    'heading' => '',
                    'items' => [],
                ],
                'style' => ['background_color' => '#ffffff', 'card_background' => '#ffffff', 'heading_background' => '#1e3a8a', 'heading_color' => '#ffffff', 'icon_background' => '#eff6ff', 'check_color' => '#22c55e'],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));

        $registry->register(new Bari12StaticSection(
            'sheikh-countdown-cta-v1',
            'Countdown CTA',
            'landing.components.sheikh-countdown-cta-v1',
            [
                'content' => [
                    'countdown_label' => ['type' => 'text', 'label' => 'Countdown Label'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                    'countdown_background' => ['type' => 'color', 'label' => 'Countdown Background'],
                    'countdown_border_color' => ['type' => 'color', 'label' => 'Countdown Border Color'],
                    'countdown_color' => ['type' => 'color', 'label' => 'Countdown Color'],
                ],
                'settings' => [
                    'countdown.duration_hours' => ['type' => 'number', 'label' => 'Countdown Hours', 'min' => 1],
                    'countdown.starts_at' => ['type' => 'datetime', 'label' => 'Starts At'],
                ],
            ],
            [
                'content' => ['countdown_label' => 'অফারটি শেষ হতে আর মাত্র...'],
                'style' => ['background_color' => '#ffffff', 'countdown_background' => '#fff7ed', 'countdown_border_color' => '#ca8a04', 'countdown_color' => '#166534'],
                'settings' => ['countdown' => ['duration_hours' => 72, 'starts_at' => null]],
                'behaviours' => ['recurring-countdown'],
                'data_source' => [],
            ],
            $category
        ));

        $registry->register(app(SheikhSeedsCheckoutFormV1::class));

        $registry->register(new Bari12StaticSection(
            'sheikh-testimonials-v1',
            'Testimonials Grid',
            'landing.components.sheikh-testimonials-v1',
            [
                'content' => [
                    'heading' => ['type' => 'text', 'label' => 'Heading'],
                    'items' => ['type' => 'repeater', 'label' => 'Testimonials'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                    'heading_color' => ['type' => 'color', 'label' => 'Heading Color'],
                ],
                'settings' => [],
            ],
            [
                'content' => [
                    'heading' => 'সন্তুষ্ট কাস্টমারদের মতামত',
                    'items' => [
                        ['name' => 'আব্দুর রহমান', 'avatar' => '👤', 'stars' => '★★★★★', 'quote' => 'বীজের মান অনেক ভালো পেয়েছি। অঙ্কুরোদগমও ভালো হয়েছে।', 'badge' => 'Verified customer'],
                        ['name' => 'ফাতেমা আক্তার', 'avatar' => '👤', 'stars' => '★★★★★', 'quote' => 'সময়মতো ডেলিভারি পেয়েছি এবং পরামর্শও পেয়েছি।', 'badge' => 'Verified customer'],
                        ['name' => 'সোহেল রানা', 'avatar' => '👤', 'stars' => '★★★★★', 'quote' => 'চারা ভালো হয়েছে, আবার অর্ডার করবো ইনশাআল্লাহ।', 'badge' => 'Verified customer'],
                        ['name' => 'হাসান মাহমুদ', 'avatar' => '👤', 'stars' => '★★★★★', 'quote' => 'কম দামে ভালো মানের বীজ পেয়েছি।', 'badge' => 'Verified customer'],
                    ],
                ],
                'style' => ['background_color' => '#f8fafc', 'heading_color' => '#1e3a8a'],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));

        $registry->register(new Bari12StaticSection(
            'sheikh-footer-v1',
            'Footer with CTA',
            'landing.components.sheikh-footer-v1',
            [
                'content' => [
                    'button_text' => ['type' => 'text', 'label' => 'Button Text'],
                    'button_url' => ['type' => 'url', 'label' => 'Button URL'],
                    'text' => ['type' => 'text', 'label' => 'Footer Text'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Background Color'],
                    'button_color' => ['type' => 'color', 'label' => 'Button Color'],
                    'button_text_color' => ['type' => 'color', 'label' => 'Button Text Color'],
                ],
                'settings' => [],
            ],
            [
                'content' => ['button_text' => 'অর্ডার করতে এখানে ক্লিক করুন', 'button_url' => '#trizync-solution-checkout-form', 'text' => '© 2024 trizync-solution. All Rights Reserved.'],
                'style' => ['background_color' => '#f3f4f6', 'button_color' => '#dc2626', 'button_text_color' => '#ffffff'],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));

        $registry->register(new Bari12StaticSection(
            'sheikh-floating-order-bar-v1',
            'Floating Action Bar',
            'landing.components.sheikh-floating-order-bar-v1',
            [
                'content' => [
                    'badge' => ['type' => 'text', 'label' => 'Badge'],
                    'title' => ['type' => 'text', 'label' => 'Title'],
                    'old_price' => ['type' => 'text', 'label' => 'Old Price'],
                    'price' => ['type' => 'text', 'label' => 'Price'],
                    'button_text' => ['type' => 'text', 'label' => 'Button Text'],
                    'button_url' => ['type' => 'url', 'label' => 'Button URL'],
                ],
                'style' => [
                    'background_color' => ['type' => 'color', 'label' => 'Bar Background'],
                    'badge_background' => ['type' => 'color', 'label' => 'Badge Background'],
                    'badge_color' => ['type' => 'color', 'label' => 'Badge Color'],
                    'text_color' => ['type' => 'color', 'label' => 'Text Color'],
                    'old_price_color' => ['type' => 'color', 'label' => 'Old Price Color'],
                    'price_color' => ['type' => 'color', 'label' => 'Price Color'],
                    'button_color' => ['type' => 'color', 'label' => 'Button Color'],
                    'button_text_color' => ['type' => 'color', 'label' => 'Button Text Color'],
                ],
                'settings' => [],
            ],
            [
                'content' => [
                    'badge' => '২ ১০০% খাঁটি বীজ',
                    'title' => 'কেজি বেগুনের বীজ কিনুন',
                    'old_price' => '৳৫০০',
                    'price' => '৳২৯৯',
                    'button_text' => 'অর্ডার করুন',
                    'button_url' => '#trizync-solution-checkout-form',
                ],
                'style' => [
                    'background_color' => '#fffefb',
                    'badge_background' => '#dcfce7',
                    'badge_color' => '#168a45',
                    'text_color' => '#2f3a3f',
                    'old_price_color' => '#b8c2c6',
                    'price_color' => '#168a45',
                    'button_color' => '#168a45',
                    'button_text_color' => '#ffffff',
                ],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ],
            $category
        ));
    }
}
