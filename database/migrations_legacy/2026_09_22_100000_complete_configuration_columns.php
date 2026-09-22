<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const INFORMATION_COLUMNS = 'facebook,instagram,tiktok,twitter,youtube,ga4_id,clarity_id,recommend_num,discount_num,newarrival_num,bkash,bkash_number,bkash_active,bkash_sandbox,bkash_app_key,bkash_app_secret,bkash_username,bkash_password,nogod,nogod_number,rocket,rocket_number,paypal,paypal_account,stripe,stripe_account,msngr_chat,msngr_plugin,supp_num1,supp_num2,supp_num3,number_visibility,redx_api_base_url,redx_api_access_token,pathao_api_base_url,pathao_api_access_token,pathao_store_id,steadfast_api_base_url,steadfast_api_key,steadfast_secret_key,carrybee_api_base_url,carrybee_api_key,carrybee_client_id,carrybee_client_secret,carrybee_client_context,carrybee_api_token,carrybee_store_id,fb_pixel_id,fb_pixel_test_code,fb_access_token,tt_pixel_id,tt_access_token,tt_test_event_code,steadfast_webhook_token,pathao_webhook_token,redx_webhook_token,carrybee_webhook_token,fraudApi,pathao_status,redx_status,time_limit,is_auto_assign,auto_assign_rules,primary_color,primary_background,primary_background2,primary_background3,gradient_code,footer_bg1,footer_bg2,footer_bg3,footer_text,footer_link_hover,footer_subtitle,footer_border_grad1,footer_border_grad2,footer_pill_bg,footer_pill_border,footer_pill_hover_bg,footer_pill_hover_text,footer_underline,footer_social_border,footer_social_bg,footer_social_hover_bg,footer_social_hover_text,mnav_bg,mnav_border,mnav_icon,mnav_home_bg,mnav_home_border,mnav_home_icon,footer_bg_color,footer_text_color,footer_accent_color,smtp_host,smtp_port,smtp_user,smtp_pass,sms_api_key,sms_sender_id,manydial_api_key,manydial_caller_id,manydial_status,admin_phone,admin_email,sms_new_order_admin,sms_status_update,sms_pending,sms_processing,sms_courier,sms_complete,sms_cancell,sms_return,sms_on_hold,sms_confirmed,sms_delivered,sms_returning,sms_return_received,sms_return_missing,sms_pending_active,sms_confirmed_active,sms_processing_active,sms_courier_active,sms_delivered_active,sms_complete_active,sms_on_hold_active,sms_cancell_active,sms_returning_active,sms_return_received_active,sms_return_missing_active,otp_system,notification_active,coupon_visibility,ssl_store_id,ssl_store_password,ssl_sandbox,ssl_active,ssl_terms_active,cod_active,ssl_sandbox_store_id,ssl_sandbox_store_password,max_order_amount,max_order_qty,invoice_type,eps_active,eps_sandbox,eps_username,eps_password,eps_hash_key,eps_merchant_id,eps_store_id,eps_sandbox_merchant_id,eps_sandbox_store_id,eps_sandbox_username,eps_sandbox_password,eps_sandbox_hash_key,nagad_active,nagad_sandbox,nagad_merchant_id,nagad_merchant_number,nagad_public_key,nagad_private_key,nagad_sandbox_merchant_id,nagad_sandbox_merchant_number,nagad_sandbox_public_key,nagad_sandbox_private_key,uddoktapay_active,uddoktapay_api_key,uddoktapay_base_url,manual_payments_active';

    public function up(): void
    {
        foreach (explode(',', self::INFORMATION_COLUMNS) as $column) {
            if (!Schema::hasColumn('informations', $column)) {
                Schema::table('informations', function (Blueprint $table) use ($column) {
                    $table->longText($column)->nullable();
                });
            }
        }

        $homeColumns = [
            'mobile_image', 'section', 'link', 'is_for_small',
            'left_image_1', 'left_link_1', 'left_image_2', 'left_link_2',
            'left_image_3', 'left_link_3', 'left_image_4', 'left_link_4',
            'right_image', 'right_link',
        ];

        foreach ($homeColumns as $column) {
            if (!Schema::hasColumn('home_section_images', $column)) {
                Schema::table('home_section_images', function (Blueprint $table) use ($column) {
                    $table->text($column)->nullable();
                });
            }
        }
    }

    public function down(): void
    {
        // Compatibility migrations are intentionally irreversible.
    }
};
