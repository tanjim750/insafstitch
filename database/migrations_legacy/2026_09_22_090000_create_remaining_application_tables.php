<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const LANDING_PAGE_TEXT_COLUMNS = 'title1,title2,video_url,phone,whatsapp,call_text,pay_text,image,landing_bg,right_product_image,new_price,old_price,regular_price_text,offer_price_text,feature,top_heading_text,left_side_title,left_side_desc,left_product_details,right_side_title,right_side_desc,review_top_text,theme_primary_col,theme_gradient_col,btn_bg_color,btn_text_color,btn_text_hero,btn_text_video,btn_text_feature,btn_text_form,hot_badge_text,warranty_text,order_btn_text,dhamaka_title,offer_price_label,currency_text,call_to_action_text,feature_title,feature_list,details_title,review_title,form_title,form_subtitle,name_label,name_placeholder,phone_label,address_label,address_placeholder,delivery_label,payment_title,cod_title,cod_subtitle,online_payment_title,online_payment_subtitle,order_summary_title,variation_label,total_bill_label,processing_text,error_msg,countdown_title,countdown_bg_color,countdown_text_color,hero_btn_bg_color,hero_btn_text_color,countdown_hours,old_price_text,new_price_text,promise_badge,promise_title,promise_img_badge,promise_1_title,promise_1_desc,promise_2_title,promise_2_desc,promise_3_title,promise_3_desc,negative_title,negative_tags,identify_badge,identify_title,identify_subtitle,trust_sec_title,trust_1_icon,trust_1_title,trust_2_icon,trust_2_title,trust_3_icon,trust_3_title,trust_4_icon,trust_4_title,id_1_icon,id_1_title,id_1_desc,id_2_icon,id_2_title,id_2_desc,id_3_icon,id_3_title,id_3_desc,id_4_icon,id_4_title,id_4_desc,id_5_icon,id_5_title,id_5_desc,id_6_icon,id_6_title,id_6_desc,id_7_icon,id_7_title,id_7_desc,id_8_icon,id_8_title,id_8_desc,review_badge,review_subtitle,stat_1_num,stat_1_text,stat_2_num,stat_2_text,stat_3_num,stat_3_text,rev_1_text,rev_1_name,rev_1_loc,rev_2_text,rev_2_name,rev_2_loc,rev_3_text,rev_3_name,rev_3_loc,rev_4_text,rev_4_name,rev_4_loc,faq_badge,faq_title,faq_1_q,faq_1_a,faq_2_q,faq_2_a,faq_3_q,faq_3_a,faq_4_q,faq_4_a,hero_rating,hero_rating_count,hero_rating_label,discount_save_text,spec_title,spec_1_label,spec_1_value,spec_2_label,spec_2_value,spec_3_label,spec_3_value,spec_4_label,spec_4_value,spec_5_label,spec_5_value,spec_6_label,spec_6_value,spec_7_label,spec_7_value,stock_count,stock_text,urgency_title,urgency_subtitle,final_cta_title,final_cta_subtitle,final_cta_btn_text,footer_company,footer_email,footer_copyright,security_badge_text,special_feature_title,sf_1_title,sf_1_desc,sf_2_title,sf_2_desc,sf_3_title,sf_3_desc,sf_4_title,sf_4_desc,sf_5_title,sf_5_desc,sf_6_title,sf_6_desc,sf_7_title,sf_7_desc,sf_8_title,sf_8_desc';

    public function up(): void
    {
        if (!Schema::hasTable('activity_logs')) {
            Schema::create('activity_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable()->index();
                $table->unsignedBigInteger('order_id')->nullable()->index();
                $table->string('action')->index();
                $table->string('module')->nullable()->index();
                $table->text('description')->nullable();
                $table->json('old_data')->nullable();
                $table->json('new_data')->nullable();
                $table->text('url')->nullable();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('expenses')) {
            Schema::create('expenses', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->decimal('amount', 14, 2)->default(0);
                $table->date('date')->index();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('ad_costs')) {
            Schema::create('ad_costs', function (Blueprint $table) {
                $table->id();
                $table->date('date')->index();
                $table->string('platform');
                $table->decimal('usd_amount', 14, 2)->default(0);
                $table->decimal('dollar_rate', 14, 4)->default(0);
                $table->decimal('total_cost', 14, 2)->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('other_expenses')) {
            Schema::create('other_expenses', function (Blueprint $table) {
                $table->id();
                $table->date('date')->index();
                $table->text('details');
                $table->decimal('amount', 14, 2)->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('landing_pages')) {
            Schema::create('landing_pages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id')->nullable()->index();
                $table->unsignedBigInteger('variation_id')->nullable()->index();
                $table->unsignedTinyInteger('page_type')->default(1)->index();

                foreach (explode(',', self::LANDING_PAGE_TEXT_COLUMNS) as $column) {
                    $table->longText($column)->nullable();
                }

                $table->timestamps();
            });
        }

        if (!Schema::hasTable('landing_page_packages')) {
            Schema::create('landing_page_packages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('landing_page_id')->index();
                $table->unsignedInteger('qty')->default(1);
                $table->decimal('price', 14, 2)->default(0);
                $table->string('discount_text')->nullable();
                $table->boolean('is_default')->default(false);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('landing_page_sliders')) {
            Schema::create('landing_page_sliders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('landing_page_id')->index();
                $table->string('image');
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('review_product_images', 'review_image')) {
            Schema::table('review_product_images', function (Blueprint $table) {
                $table->string('review_image')->nullable();
            });
        }
    }

    public function down(): void
    {
        foreach ([
            'landing_page_sliders', 'landing_page_packages', 'landing_pages',
            'other_expenses', 'ad_costs', 'expenses', 'activity_logs',
        ] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
