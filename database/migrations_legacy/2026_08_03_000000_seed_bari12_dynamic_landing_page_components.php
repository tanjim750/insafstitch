<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $slug = 'bari-12-eggplant-seeds';

    public function up(): void
    {
        if (
            !Schema::hasTable('dynamic_landing_pages')
            || !Schema::hasTable('dynamic_landing_page_components')
        ) {
            return;
        }

        $now = now();

        DB::table('dynamic_landing_pages')->updateOrInsert(
            ['slug' => $this->slug],
            [
                'name' => 'Bari-12 Eggplant Seeds',
                'status' => 'draft',
                'theme' => $this->json([
                    'primary' => '#0d631b',
                    'secondary' => '#006e1c',
                    'background' => '#faf9f5',
                    'surface' => '#ffffff',
                    'text' => '#1a1c1a',
                    'muted_text' => '#64748b',
                ]),
                'seo' => $this->json([
                    'title' => 'trizync-solution - Bari-12 Eggplant Seeds',
                    'description' => 'বারি বেগুন-১২ প্রিমিয়াম বীজের অফার, সুবিধা, ছবি এবং অর্ডার ফর্ম।',
                ]),
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );

        $pageId = DB::table('dynamic_landing_pages')
            ->where('slug', $this->slug)
            ->value('id');

        if (!$pageId) {
            return;
        }

        DB::table('dynamic_landing_page_components')
            ->where('dynamic_landing_page_id', $pageId)
            ->delete();

        foreach ($this->components($pageId, $now) as $component) {
            DB::table('dynamic_landing_page_components')->insert($component);
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('dynamic_landing_pages')) {
            return;
        }

        $pageId = DB::table('dynamic_landing_pages')
            ->where('slug', $this->slug)
            ->value('id');

        if ($pageId && Schema::hasTable('dynamic_landing_page_components')) {
            DB::table('dynamic_landing_page_components')
                ->where('dynamic_landing_page_id', $pageId)
                ->delete();
        }

        DB::table('dynamic_landing_pages')
            ->where('slug', $this->slug)
            ->delete();
    }

    private function components(int $pageId, mixed $now): array
    {
        return [
            $this->component($pageId, 'seed-offer-hero-v1', 'cmp_bari12_hero', 1, [
                'content' => [
                    'badge_text' => 'সীমিত সময়ের অফার!',
                    'title' => 'বারি বেগুন-১২ এর প্রিমিয়াম বীজ এখন আরও সুলভে',
                    'description' => 'প্রতিটি বেগুন ১ কেজি পর্যন্ত ওজনের হতে পারে। উচ্চ ফলনশীল ও লবনাক্ততা সহিষ্ণু উন্নত জাতের বীজ সরাসরি আপনার দুয়ারে।',
                    'offer_label' => 'অফার মূল্য',
                    'price' => '৳৩০০',
                    'old_price' => '৳৪০০',
                    'timer_label' => 'অফারটি শেষ হবে',
                    'image_url' => '/images/no_found.png',
                    'image_alt' => 'A large Bari-12 eggplant held by a farmer in a green field.',
                    'trust_badge' => '১০০% গ্যারান্টি',
                ],
                'style' => [
                    'background_color' => '#0d631b',
                    'accent_color' => '#ffb300',
                    'text_color' => '#ffffff',
                ],
                'settings' => [
                    'countdown' => [
                        'duration_hours' => 4,
                        'starts_at' => null,
                    ],
                ],
            ], $now),
            $this->component($pageId, 'seed-benefits-v1', 'cmp_bari12_benefits', 2, [
                'content' => [
                    'heading' => 'কেন বারি বেগুন-১২ চাষ করবেন?',
                    'feature_title' => 'উচ্চ ফলনশীল ও পুষ্টিগুণে ভরপুর',
                    'feature_description' => 'বারি বেগুন-১২ একটি নতুন জাতের উন্নত বেগুন, যা লবনাক্ত জমিতেও সফলভাবে চাষ করা যায়। এটি রোগ প্রতিরোধে সক্ষম এবং দীর্ঘ সময় ফলন দেয়।',
                    'feature_points' => [
                        'প্রতিটি বেগুনের ওজন ৮০০ গ্রাম থেকে ১ কেজি পর্যন্ত হয়।',
                        'লবনাক্ততা এবং উচ্চ তাপমাত্রায় ফলন ভালো হয়।',
                    ],
                    'cards' => [
                        ['icon' => 'local_shipping', 'title' => 'ফ্রি ডেলিভারি', 'description' => 'সারা বাংলাদেশে দ্রুত এবং সম্পূর্ণ বিনামূল্যে ডেলিভারি চার্জ ছাড়া হোম ডেলিভারি।'],
                        ['icon' => 'menu_book', 'title' => 'গাইডলাইন বই', 'description' => 'বীজ রোপন পদ্ধতি ও পরিচর্যার জন্য একটি বিস্তারিত গাইডলাইন বই উপহার।'],
                    ],
                    'trust_cards' => [
                        ['icon' => 'verified', 'title' => '১০০% অরিজিনাল বীজ', 'description' => 'আমরা সরাসরি বিশ্বস্ত উৎস থেকে সংগৃহীত এ গ্রেড কোয়ালিটির হাইব্রিড বীজ সরবরাহ করি।'],
                        ['icon' => 'sentiment_satisfied', 'title' => 'মানি ব্যাক গ্যারান্টি', 'description' => 'বীজ না গজালে টাকা ফেরতের ১০০% নিশ্চয়তা দিচ্ছি আমরা।'],
                    ],
                ],
                'style' => [
                    'background_color' => '#faf9f5',
                    'accent_color' => '#ffb300',
                ],
                'settings' => [],
            ], $now),
            $this->component($pageId, 'seed-gallery-v1', 'cmp_bari12_gallery', 3, [
                'content' => [
                    'heading' => 'বারি বেগুন-১২ এর বাস্তব কিছু ছবি',
                    'images' => [
                        ['url' => '/images/no_found.png', 'alt' => 'Bari-12 eggplants on a plant.'],
                        ['url' => '/images/no_found.png', 'alt' => 'Farmer holding harvested Bari-12 eggplants.'],
                        ['url' => '/images/no_found.png', 'alt' => 'Seed packet and gardening tools.'],
                        ['url' => '/images/no_found.png', 'alt' => 'Macro photograph of Bari-12 seeds.'],
                    ],
                ],
                'style' => [
                    'background_color' => '#faf9f5',
                ],
                'settings' => [
                    'columns' => 4,
                ],
            ], $now),
            $this->component($pageId, 'seed-checkout-v1', 'cmp_bari12_checkout', 4, [
                'content' => [
                    'heading' => 'অর্ডার করতে নিচের ফর্মটি সঠিক ভাবে পূরণ করুন',
                    'customer_heading' => 'আপনার তথ্য দিন',
                    'product_heading' => 'পণ্য নির্বাচন করুন',
                    'delivery_title' => 'ডেলিভারি চার্জ সম্পূর্ণ ফ্রি!',
                    'delivery_description' => 'অর্ডার কনফার্ম করার পর ২-৩ দিনের মধ্যে হোম ডেলিভারি পাবেন ইনশাআল্লাহ।',
                    'packages' => [
                        ['quantity' => 1, 'title' => '১ প্যাকেট বারি-১২ বেগুনের বীজ', 'subtitle' => '+ ১ প্যাকেট শসা বীজ ফ্রি', 'price' => '৳৩০০'],
                        ['quantity' => 2, 'title' => '২ প্যাকেট বারি-১২ বেগুনের বীজ', 'subtitle' => '+ ২ প্যাকেট শসা বীজ ফ্রি', 'price' => '৳৫৫০'],
                    ],
                    'summary_title' => 'অর্ডার সামারি',
                    'payment_note' => 'পেমেন্ট মাধ্যম: ক্যাশ অন ডেলিভারি (পণ্য বুঝে পেয়ে টাকা দিন)',
                    'button_text' => 'অর্ডার সম্পন্ন করুন',
                ],
                'style' => [
                    'background_color' => '#eeeeea',
                    'button_color' => '#0d631b',
                ],
                'settings' => [
                    'default_quantity' => 1,
                ],
                'data_source' => [
                    'product_ids' => [],
                ],
            ], $now),
            $this->component($pageId, 'seed-support-v1', 'cmp_bari12_support', 5, [
                'content' => [
                    'heading' => 'প্রয়োজনে কল বা হোয়াটসঅ্যাপ করুন',
                    'phone' => '01897926161',
                    'badges' => [
                        ['icon' => 'local_shipping', 'text' => 'দেশজুড়ে ফ্রি শিপিং'],
                        ['icon' => 'shield', 'text' => 'সুরক্ষিত পেমেন্ট'],
                        ['icon' => 'history', 'text' => '৭ দিনের রিপ্লেসমেন্ট'],
                    ],
                ],
                'style' => [
                    'button_color' => '#006e1c',
                ],
                'settings' => [],
            ], $now),
            $this->component($pageId, 'seed-footer-v1', 'cmp_bari12_footer', 6, [
                'content' => [
                    'brand' => 'trizync-solution',
                    'description' => '© 2024 trizync-solution. Growth, precision, and earth-bound reliability.',
                    'links' => [
                        ['label' => 'Privacy Policy', 'url' => '#'],
                        ['label' => 'Terms of Service', 'url' => '#'],
                        ['label' => 'Shipping Info', 'url' => '#'],
                        ['label' => 'Contact Us', 'url' => '#'],
                    ],
                ],
                'style' => [
                    'background_color' => '#e2e3df',
                ],
                'settings' => [],
            ], $now),
        ];
    }

    private function component(int $pageId, string $key, string $scope, int $sortOrder, array $config, mixed $now): array
    {
        return [
            'dynamic_landing_page_id' => $pageId,
            'component_key' => $key,
            'instance_scope' => $scope,
            'sort_order' => $sortOrder,
            'config' => $this->json(array_replace_recursive([
                'content' => [],
                'style' => [],
                'settings' => [],
                'behaviours' => [],
                'data_source' => [],
            ], $config)),
            'is_enabled' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }

    private function json(array $value): string
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
};
