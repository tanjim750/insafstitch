/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speech` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_img_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_img_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_img_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_caption_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_caption_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_caption_three` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `order_id` bigint unsigned DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `old_data` json DEFAULT NULL,
  `new_data` json DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_logs_user_id_index` (`user_id`),
  KEY `activity_logs_order_id_index` (`order_id`),
  KEY `activity_logs_action_index` (`action`),
  KEY `activity_logs_module_index` (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ad_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ad_costs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usd_amount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `dollar_rate` decimal(14,4) NOT NULL DEFAULT '0.0000',
  `total_cost` decimal(14,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_costs_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `admin_texts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_texts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `popular_category_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_all_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_to_cart_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_now_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_delivery_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submit_review_btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_tab_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviews_tab_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `bangla_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bangla_text` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `checkout_form_top_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_confirm_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fshipping_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `blocked_ips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blocked_ips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blocked_ips_ip_address_unique` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `careers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image_caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_img_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_one_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_one_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_img_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_two_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_two_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_img_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_three_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_three_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_img_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_four_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_four_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_img_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_five_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_five_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `is_menu` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_url_unique` (`url`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_is_popular_index` (`is_popular`),
  KEY `categories_is_menu_index` (`is_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `combo_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `combo_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `combo_id` smallint NOT NULL,
  `product_id` mediumint NOT NULL,
  `size_id` tinyint NOT NULL,
  `quantity` decimal(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `combos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `combos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` mediumint NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `coupon_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `minimum_amount` decimal(12,2) DEFAULT NULL,
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupon_codes_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `courier_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courier_rates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_weight` decimal(8,2) NOT NULL DEFAULT '1.00',
  `base_charge` decimal(12,2) NOT NULL DEFAULT '0.00',
  `extra_per_kg_charge` decimal(12,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courier_rates_courier_name_unique` (`courier_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `couriers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `couriers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `delivery_charges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_charges` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `charge_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'flat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_charges_status_index` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `dynamic_landing_action_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dynamic_landing_action_attempts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dynamic_landing_page_component_id` bigint unsigned DEFAULT NULL,
  `dynamic_landing_page_version_id` bigint unsigned DEFAULT NULL,
  `source_component_id` bigint unsigned DEFAULT NULL,
  `action_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idempotency_key` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_hash` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `order_id` bigint unsigned DEFAULT NULL,
  `response` json DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dynamic_landing_action_attempts_unique` (`dynamic_landing_page_component_id`,`action_key`,`idempotency_key`),
  UNIQUE KEY `dyn_lp_action_attempts_version_unique` (`dynamic_landing_page_version_id`,`source_component_id`,`action_key`,`idempotency_key`),
  KEY `dyn_lp_action_order_fk` (`order_id`),
  CONSTRAINT `dyn_lp_action_component_fk` FOREIGN KEY (`dynamic_landing_page_component_id`) REFERENCES `dynamic_landing_page_components` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dyn_lp_action_order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dyn_lp_action_version_fk` FOREIGN KEY (`dynamic_landing_page_version_id`) REFERENCES `dynamic_landing_page_versions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `dynamic_landing_page_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dynamic_landing_page_components` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dynamic_landing_page_id` bigint unsigned NOT NULL,
  `component_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance_scope` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `config` json NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dynamic_landing_page_components_instance_scope_unique` (`instance_scope`),
  KEY `dynamic_lp_components_page_order_index` (`dynamic_landing_page_id`,`sort_order`),
  CONSTRAINT `dynamic_landing_page_components_dynamic_landing_page_id_foreign` FOREIGN KEY (`dynamic_landing_page_id`) REFERENCES `dynamic_landing_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `dynamic_landing_page_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dynamic_landing_page_versions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dynamic_landing_page_id` bigint unsigned NOT NULL,
  `version_number` int unsigned NOT NULL,
  `snapshot` json NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `created_by` bigint unsigned DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dyn_lp_versions_number_unique` (`dynamic_landing_page_id`,`version_number`),
  KEY `dyn_lp_versions_creator_fk` (`created_by`),
  KEY `dyn_lp_versions_page_status_index` (`dynamic_landing_page_id`,`status`),
  CONSTRAINT `dyn_lp_versions_creator_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dyn_lp_versions_page_fk` FOREIGN KEY (`dynamic_landing_page_id`) REFERENCES `dynamic_landing_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `dynamic_landing_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dynamic_landing_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `theme` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dynamic_landing_pages_slug_unique` (`slug`),
  KEY `dynamic_landing_pages_created_by_foreign` (`created_by`),
  KEY `dynamic_landing_pages_updated_by_foreign` (`updated_by`),
  CONSTRAINT `dynamic_landing_pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dynamic_landing_pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `dynamic_landing_saved_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dynamic_landing_saved_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `components` json NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dynamic_landing_saved_sections_created_by_foreign` (`created_by`),
  KEY `dynamic_landing_saved_sections_updated_by_foreign` (`updated_by`),
  KEY `dynamic_lp_saved_sections_category_name_index` (`category`,`name`),
  CONSTRAINT `dynamic_landing_saved_sections_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `dynamic_landing_saved_sections_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `facebook_feed_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facebook_feed_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `home_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `serial` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `home_categories_category_id_unique` (`category_id`),
  KEY `home_categories_serial_index` (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `home_section_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_section_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_image` text COLLATE utf8mb4_unicode_ci,
  `section` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `is_for_small` text COLLATE utf8mb4_unicode_ci,
  `left_image_1` text COLLATE utf8mb4_unicode_ci,
  `left_link_1` text COLLATE utf8mb4_unicode_ci,
  `left_image_2` text COLLATE utf8mb4_unicode_ci,
  `left_link_2` text COLLATE utf8mb4_unicode_ci,
  `left_image_3` text COLLATE utf8mb4_unicode_ci,
  `left_link_3` text COLLATE utf8mb4_unicode_ci,
  `left_image_4` text COLLATE utf8mb4_unicode_ci,
  `left_link_4` text COLLATE utf8mb4_unicode_ci,
  `right_image` text COLLATE utf8mb4_unicode_ci,
  `right_link` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `copyright` text COLLATE utf8mb4_unicode_ci,
  `topbar_notice` text COLLATE utf8mb4_unicode_ci,
  `topbar_active` tinyint(1) NOT NULL DEFAULT '0',
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BDT',
  `whats_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whats_active` tinyint(1) NOT NULL DEFAULT '0',
  `tracking_code` longtext COLLATE utf8mb4_unicode_ci,
  `stock_warning_limit` int unsigned NOT NULL DEFAULT '5',
  `is_ip_check` tinyint(1) NOT NULL DEFAULT '0',
  `is_mobile_check` tinyint(1) NOT NULL DEFAULT '0',
  `is_auto_assign` tinyint(1) NOT NULL DEFAULT '0',
  `auto_assign_rules` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `common_btn_color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `common_btn_text_color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_now_btn_color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_now_btn_text_color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` longtext COLLATE utf8mb4_unicode_ci,
  `instagram` longtext COLLATE utf8mb4_unicode_ci,
  `tiktok` longtext COLLATE utf8mb4_unicode_ci,
  `twitter` longtext COLLATE utf8mb4_unicode_ci,
  `youtube` longtext COLLATE utf8mb4_unicode_ci,
  `ga4_id` longtext COLLATE utf8mb4_unicode_ci,
  `clarity_id` longtext COLLATE utf8mb4_unicode_ci,
  `recommend_num` longtext COLLATE utf8mb4_unicode_ci,
  `discount_num` longtext COLLATE utf8mb4_unicode_ci,
  `newarrival_num` longtext COLLATE utf8mb4_unicode_ci,
  `bkash` longtext COLLATE utf8mb4_unicode_ci,
  `bkash_number` longtext COLLATE utf8mb4_unicode_ci,
  `bkash_active` longtext COLLATE utf8mb4_unicode_ci,
  `bkash_sandbox` longtext COLLATE utf8mb4_unicode_ci,
  `bkash_app_key` longtext COLLATE utf8mb4_unicode_ci,
  `bkash_app_secret` longtext COLLATE utf8mb4_unicode_ci,
  `bkash_username` longtext COLLATE utf8mb4_unicode_ci,
  `bkash_password` longtext COLLATE utf8mb4_unicode_ci,
  `nogod` longtext COLLATE utf8mb4_unicode_ci,
  `nogod_number` longtext COLLATE utf8mb4_unicode_ci,
  `rocket` longtext COLLATE utf8mb4_unicode_ci,
  `rocket_number` longtext COLLATE utf8mb4_unicode_ci,
  `paypal` longtext COLLATE utf8mb4_unicode_ci,
  `paypal_account` longtext COLLATE utf8mb4_unicode_ci,
  `stripe` longtext COLLATE utf8mb4_unicode_ci,
  `stripe_account` longtext COLLATE utf8mb4_unicode_ci,
  `msngr_chat` longtext COLLATE utf8mb4_unicode_ci,
  `msngr_plugin` longtext COLLATE utf8mb4_unicode_ci,
  `supp_num1` longtext COLLATE utf8mb4_unicode_ci,
  `supp_num2` longtext COLLATE utf8mb4_unicode_ci,
  `supp_num3` longtext COLLATE utf8mb4_unicode_ci,
  `number_visibility` longtext COLLATE utf8mb4_unicode_ci,
  `redx_api_base_url` longtext COLLATE utf8mb4_unicode_ci,
  `redx_api_access_token` longtext COLLATE utf8mb4_unicode_ci,
  `pathao_api_base_url` longtext COLLATE utf8mb4_unicode_ci,
  `pathao_api_access_token` longtext COLLATE utf8mb4_unicode_ci,
  `pathao_store_id` longtext COLLATE utf8mb4_unicode_ci,
  `steadfast_api_base_url` longtext COLLATE utf8mb4_unicode_ci,
  `steadfast_api_key` longtext COLLATE utf8mb4_unicode_ci,
  `steadfast_secret_key` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_api_base_url` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_api_key` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_client_id` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_client_secret` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_client_context` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_api_token` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_store_id` longtext COLLATE utf8mb4_unicode_ci,
  `fb_pixel_id` longtext COLLATE utf8mb4_unicode_ci,
  `fb_pixel_test_code` longtext COLLATE utf8mb4_unicode_ci,
  `fb_access_token` longtext COLLATE utf8mb4_unicode_ci,
  `tt_pixel_id` longtext COLLATE utf8mb4_unicode_ci,
  `tt_access_token` longtext COLLATE utf8mb4_unicode_ci,
  `tt_test_event_code` longtext COLLATE utf8mb4_unicode_ci,
  `steadfast_webhook_token` longtext COLLATE utf8mb4_unicode_ci,
  `pathao_webhook_token` longtext COLLATE utf8mb4_unicode_ci,
  `redx_webhook_token` longtext COLLATE utf8mb4_unicode_ci,
  `carrybee_webhook_token` longtext COLLATE utf8mb4_unicode_ci,
  `fraudApi` longtext COLLATE utf8mb4_unicode_ci,
  `pathao_status` longtext COLLATE utf8mb4_unicode_ci,
  `redx_status` longtext COLLATE utf8mb4_unicode_ci,
  `time_limit` longtext COLLATE utf8mb4_unicode_ci,
  `primary_color` longtext COLLATE utf8mb4_unicode_ci,
  `primary_background` longtext COLLATE utf8mb4_unicode_ci,
  `primary_background2` longtext COLLATE utf8mb4_unicode_ci,
  `primary_background3` longtext COLLATE utf8mb4_unicode_ci,
  `gradient_code` longtext COLLATE utf8mb4_unicode_ci,
  `footer_bg1` longtext COLLATE utf8mb4_unicode_ci,
  `footer_bg2` longtext COLLATE utf8mb4_unicode_ci,
  `footer_bg3` longtext COLLATE utf8mb4_unicode_ci,
  `footer_text` longtext COLLATE utf8mb4_unicode_ci,
  `footer_link_hover` longtext COLLATE utf8mb4_unicode_ci,
  `footer_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `footer_border_grad1` longtext COLLATE utf8mb4_unicode_ci,
  `footer_border_grad2` longtext COLLATE utf8mb4_unicode_ci,
  `footer_pill_bg` longtext COLLATE utf8mb4_unicode_ci,
  `footer_pill_border` longtext COLLATE utf8mb4_unicode_ci,
  `footer_pill_hover_bg` longtext COLLATE utf8mb4_unicode_ci,
  `footer_pill_hover_text` longtext COLLATE utf8mb4_unicode_ci,
  `footer_underline` longtext COLLATE utf8mb4_unicode_ci,
  `footer_social_border` longtext COLLATE utf8mb4_unicode_ci,
  `footer_social_bg` longtext COLLATE utf8mb4_unicode_ci,
  `footer_social_hover_bg` longtext COLLATE utf8mb4_unicode_ci,
  `footer_social_hover_text` longtext COLLATE utf8mb4_unicode_ci,
  `mnav_bg` longtext COLLATE utf8mb4_unicode_ci,
  `mnav_border` longtext COLLATE utf8mb4_unicode_ci,
  `mnav_icon` longtext COLLATE utf8mb4_unicode_ci,
  `mnav_home_bg` longtext COLLATE utf8mb4_unicode_ci,
  `mnav_home_border` longtext COLLATE utf8mb4_unicode_ci,
  `mnav_home_icon` longtext COLLATE utf8mb4_unicode_ci,
  `footer_bg_color` longtext COLLATE utf8mb4_unicode_ci,
  `footer_text_color` longtext COLLATE utf8mb4_unicode_ci,
  `footer_accent_color` longtext COLLATE utf8mb4_unicode_ci,
  `smtp_host` longtext COLLATE utf8mb4_unicode_ci,
  `smtp_port` longtext COLLATE utf8mb4_unicode_ci,
  `smtp_user` longtext COLLATE utf8mb4_unicode_ci,
  `smtp_pass` longtext COLLATE utf8mb4_unicode_ci,
  `sms_api_key` longtext COLLATE utf8mb4_unicode_ci,
  `sms_sender_id` longtext COLLATE utf8mb4_unicode_ci,
  `manydial_api_key` longtext COLLATE utf8mb4_unicode_ci,
  `manydial_caller_id` longtext COLLATE utf8mb4_unicode_ci,
  `manydial_status` longtext COLLATE utf8mb4_unicode_ci,
  `admin_phone` longtext COLLATE utf8mb4_unicode_ci,
  `admin_email` longtext COLLATE utf8mb4_unicode_ci,
  `sms_new_order_admin` longtext COLLATE utf8mb4_unicode_ci,
  `sms_status_update` longtext COLLATE utf8mb4_unicode_ci,
  `sms_pending` longtext COLLATE utf8mb4_unicode_ci,
  `sms_processing` longtext COLLATE utf8mb4_unicode_ci,
  `sms_courier` longtext COLLATE utf8mb4_unicode_ci,
  `sms_complete` longtext COLLATE utf8mb4_unicode_ci,
  `sms_cancell` longtext COLLATE utf8mb4_unicode_ci,
  `sms_return` longtext COLLATE utf8mb4_unicode_ci,
  `sms_on_hold` longtext COLLATE utf8mb4_unicode_ci,
  `sms_confirmed` longtext COLLATE utf8mb4_unicode_ci,
  `sms_delivered` longtext COLLATE utf8mb4_unicode_ci,
  `sms_returning` longtext COLLATE utf8mb4_unicode_ci,
  `sms_return_received` longtext COLLATE utf8mb4_unicode_ci,
  `sms_return_missing` longtext COLLATE utf8mb4_unicode_ci,
  `sms_pending_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_confirmed_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_processing_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_courier_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_delivered_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_complete_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_on_hold_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_cancell_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_returning_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_return_received_active` longtext COLLATE utf8mb4_unicode_ci,
  `sms_return_missing_active` longtext COLLATE utf8mb4_unicode_ci,
  `otp_system` longtext COLLATE utf8mb4_unicode_ci,
  `notification_active` longtext COLLATE utf8mb4_unicode_ci,
  `coupon_visibility` longtext COLLATE utf8mb4_unicode_ci,
  `ssl_store_id` longtext COLLATE utf8mb4_unicode_ci,
  `ssl_store_password` longtext COLLATE utf8mb4_unicode_ci,
  `ssl_sandbox` longtext COLLATE utf8mb4_unicode_ci,
  `ssl_active` longtext COLLATE utf8mb4_unicode_ci,
  `ssl_terms_active` longtext COLLATE utf8mb4_unicode_ci,
  `cod_active` longtext COLLATE utf8mb4_unicode_ci,
  `ssl_sandbox_store_id` longtext COLLATE utf8mb4_unicode_ci,
  `ssl_sandbox_store_password` longtext COLLATE utf8mb4_unicode_ci,
  `max_order_amount` longtext COLLATE utf8mb4_unicode_ci,
  `max_order_qty` longtext COLLATE utf8mb4_unicode_ci,
  `invoice_type` longtext COLLATE utf8mb4_unicode_ci,
  `eps_active` longtext COLLATE utf8mb4_unicode_ci,
  `eps_sandbox` longtext COLLATE utf8mb4_unicode_ci,
  `eps_username` longtext COLLATE utf8mb4_unicode_ci,
  `eps_password` longtext COLLATE utf8mb4_unicode_ci,
  `eps_hash_key` longtext COLLATE utf8mb4_unicode_ci,
  `eps_merchant_id` longtext COLLATE utf8mb4_unicode_ci,
  `eps_store_id` longtext COLLATE utf8mb4_unicode_ci,
  `eps_sandbox_merchant_id` longtext COLLATE utf8mb4_unicode_ci,
  `eps_sandbox_store_id` longtext COLLATE utf8mb4_unicode_ci,
  `eps_sandbox_username` longtext COLLATE utf8mb4_unicode_ci,
  `eps_sandbox_password` longtext COLLATE utf8mb4_unicode_ci,
  `eps_sandbox_hash_key` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_active` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_sandbox` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_merchant_id` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_merchant_number` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_public_key` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_private_key` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_sandbox_merchant_id` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_sandbox_merchant_number` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_sandbox_public_key` longtext COLLATE utf8mb4_unicode_ci,
  `nagad_sandbox_private_key` longtext COLLATE utf8mb4_unicode_ci,
  `uddoktapay_active` longtext COLLATE utf8mb4_unicode_ci,
  `uddoktapay_api_key` longtext COLLATE utf8mb4_unicode_ci,
  `uddoktapay_base_url` longtext COLLATE utf8mb4_unicode_ci,
  `manual_payments_active` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `landing_page_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landing_page_packages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `landing_page_id` bigint unsigned NOT NULL,
  `qty` int unsigned NOT NULL DEFAULT '1',
  `price` decimal(14,2) NOT NULL DEFAULT '0.00',
  `discount_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `landing_page_packages_landing_page_id_index` (`landing_page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `landing_page_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landing_page_sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `landing_page_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `landing_page_sliders_landing_page_id_index` (`landing_page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `landing_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landing_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `variation_id` bigint unsigned DEFAULT NULL,
  `page_type` tinyint unsigned NOT NULL DEFAULT '1',
  `title1` longtext COLLATE utf8mb4_unicode_ci,
  `title2` longtext COLLATE utf8mb4_unicode_ci,
  `video_url` longtext COLLATE utf8mb4_unicode_ci,
  `phone` longtext COLLATE utf8mb4_unicode_ci,
  `whatsapp` longtext COLLATE utf8mb4_unicode_ci,
  `call_text` longtext COLLATE utf8mb4_unicode_ci,
  `pay_text` longtext COLLATE utf8mb4_unicode_ci,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `landing_bg` longtext COLLATE utf8mb4_unicode_ci,
  `right_product_image` longtext COLLATE utf8mb4_unicode_ci,
  `new_price` longtext COLLATE utf8mb4_unicode_ci,
  `old_price` longtext COLLATE utf8mb4_unicode_ci,
  `regular_price_text` longtext COLLATE utf8mb4_unicode_ci,
  `offer_price_text` longtext COLLATE utf8mb4_unicode_ci,
  `feature` longtext COLLATE utf8mb4_unicode_ci,
  `top_heading_text` longtext COLLATE utf8mb4_unicode_ci,
  `left_side_title` longtext COLLATE utf8mb4_unicode_ci,
  `left_side_desc` longtext COLLATE utf8mb4_unicode_ci,
  `left_product_details` longtext COLLATE utf8mb4_unicode_ci,
  `right_side_title` longtext COLLATE utf8mb4_unicode_ci,
  `right_side_desc` longtext COLLATE utf8mb4_unicode_ci,
  `review_top_text` longtext COLLATE utf8mb4_unicode_ci,
  `theme_primary_col` longtext COLLATE utf8mb4_unicode_ci,
  `theme_gradient_col` longtext COLLATE utf8mb4_unicode_ci,
  `btn_bg_color` longtext COLLATE utf8mb4_unicode_ci,
  `btn_text_color` longtext COLLATE utf8mb4_unicode_ci,
  `btn_text_hero` longtext COLLATE utf8mb4_unicode_ci,
  `btn_text_video` longtext COLLATE utf8mb4_unicode_ci,
  `btn_text_feature` longtext COLLATE utf8mb4_unicode_ci,
  `btn_text_form` longtext COLLATE utf8mb4_unicode_ci,
  `hot_badge_text` longtext COLLATE utf8mb4_unicode_ci,
  `warranty_text` longtext COLLATE utf8mb4_unicode_ci,
  `order_btn_text` longtext COLLATE utf8mb4_unicode_ci,
  `dhamaka_title` longtext COLLATE utf8mb4_unicode_ci,
  `offer_price_label` longtext COLLATE utf8mb4_unicode_ci,
  `currency_text` longtext COLLATE utf8mb4_unicode_ci,
  `call_to_action_text` longtext COLLATE utf8mb4_unicode_ci,
  `feature_title` longtext COLLATE utf8mb4_unicode_ci,
  `feature_list` longtext COLLATE utf8mb4_unicode_ci,
  `details_title` longtext COLLATE utf8mb4_unicode_ci,
  `review_title` longtext COLLATE utf8mb4_unicode_ci,
  `form_title` longtext COLLATE utf8mb4_unicode_ci,
  `form_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `name_label` longtext COLLATE utf8mb4_unicode_ci,
  `name_placeholder` longtext COLLATE utf8mb4_unicode_ci,
  `phone_label` longtext COLLATE utf8mb4_unicode_ci,
  `address_label` longtext COLLATE utf8mb4_unicode_ci,
  `address_placeholder` longtext COLLATE utf8mb4_unicode_ci,
  `delivery_label` longtext COLLATE utf8mb4_unicode_ci,
  `payment_title` longtext COLLATE utf8mb4_unicode_ci,
  `cod_title` longtext COLLATE utf8mb4_unicode_ci,
  `cod_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `online_payment_title` longtext COLLATE utf8mb4_unicode_ci,
  `online_payment_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `order_summary_title` longtext COLLATE utf8mb4_unicode_ci,
  `variation_label` longtext COLLATE utf8mb4_unicode_ci,
  `total_bill_label` longtext COLLATE utf8mb4_unicode_ci,
  `processing_text` longtext COLLATE utf8mb4_unicode_ci,
  `error_msg` longtext COLLATE utf8mb4_unicode_ci,
  `countdown_title` longtext COLLATE utf8mb4_unicode_ci,
  `countdown_bg_color` longtext COLLATE utf8mb4_unicode_ci,
  `countdown_text_color` longtext COLLATE utf8mb4_unicode_ci,
  `hero_btn_bg_color` longtext COLLATE utf8mb4_unicode_ci,
  `hero_btn_text_color` longtext COLLATE utf8mb4_unicode_ci,
  `countdown_hours` longtext COLLATE utf8mb4_unicode_ci,
  `old_price_text` longtext COLLATE utf8mb4_unicode_ci,
  `new_price_text` longtext COLLATE utf8mb4_unicode_ci,
  `promise_badge` longtext COLLATE utf8mb4_unicode_ci,
  `promise_title` longtext COLLATE utf8mb4_unicode_ci,
  `promise_img_badge` longtext COLLATE utf8mb4_unicode_ci,
  `promise_1_title` longtext COLLATE utf8mb4_unicode_ci,
  `promise_1_desc` longtext COLLATE utf8mb4_unicode_ci,
  `promise_2_title` longtext COLLATE utf8mb4_unicode_ci,
  `promise_2_desc` longtext COLLATE utf8mb4_unicode_ci,
  `promise_3_title` longtext COLLATE utf8mb4_unicode_ci,
  `promise_3_desc` longtext COLLATE utf8mb4_unicode_ci,
  `negative_title` longtext COLLATE utf8mb4_unicode_ci,
  `negative_tags` longtext COLLATE utf8mb4_unicode_ci,
  `identify_badge` longtext COLLATE utf8mb4_unicode_ci,
  `identify_title` longtext COLLATE utf8mb4_unicode_ci,
  `identify_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `trust_sec_title` longtext COLLATE utf8mb4_unicode_ci,
  `trust_1_icon` longtext COLLATE utf8mb4_unicode_ci,
  `trust_1_title` longtext COLLATE utf8mb4_unicode_ci,
  `trust_2_icon` longtext COLLATE utf8mb4_unicode_ci,
  `trust_2_title` longtext COLLATE utf8mb4_unicode_ci,
  `trust_3_icon` longtext COLLATE utf8mb4_unicode_ci,
  `trust_3_title` longtext COLLATE utf8mb4_unicode_ci,
  `trust_4_icon` longtext COLLATE utf8mb4_unicode_ci,
  `trust_4_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_1_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_1_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_1_desc` longtext COLLATE utf8mb4_unicode_ci,
  `id_2_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_2_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_2_desc` longtext COLLATE utf8mb4_unicode_ci,
  `id_3_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_3_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_3_desc` longtext COLLATE utf8mb4_unicode_ci,
  `id_4_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_4_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_4_desc` longtext COLLATE utf8mb4_unicode_ci,
  `id_5_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_5_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_5_desc` longtext COLLATE utf8mb4_unicode_ci,
  `id_6_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_6_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_6_desc` longtext COLLATE utf8mb4_unicode_ci,
  `id_7_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_7_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_7_desc` longtext COLLATE utf8mb4_unicode_ci,
  `id_8_icon` longtext COLLATE utf8mb4_unicode_ci,
  `id_8_title` longtext COLLATE utf8mb4_unicode_ci,
  `id_8_desc` longtext COLLATE utf8mb4_unicode_ci,
  `review_badge` longtext COLLATE utf8mb4_unicode_ci,
  `review_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `stat_1_num` longtext COLLATE utf8mb4_unicode_ci,
  `stat_1_text` longtext COLLATE utf8mb4_unicode_ci,
  `stat_2_num` longtext COLLATE utf8mb4_unicode_ci,
  `stat_2_text` longtext COLLATE utf8mb4_unicode_ci,
  `stat_3_num` longtext COLLATE utf8mb4_unicode_ci,
  `stat_3_text` longtext COLLATE utf8mb4_unicode_ci,
  `rev_1_text` longtext COLLATE utf8mb4_unicode_ci,
  `rev_1_name` longtext COLLATE utf8mb4_unicode_ci,
  `rev_1_loc` longtext COLLATE utf8mb4_unicode_ci,
  `rev_2_text` longtext COLLATE utf8mb4_unicode_ci,
  `rev_2_name` longtext COLLATE utf8mb4_unicode_ci,
  `rev_2_loc` longtext COLLATE utf8mb4_unicode_ci,
  `rev_3_text` longtext COLLATE utf8mb4_unicode_ci,
  `rev_3_name` longtext COLLATE utf8mb4_unicode_ci,
  `rev_3_loc` longtext COLLATE utf8mb4_unicode_ci,
  `rev_4_text` longtext COLLATE utf8mb4_unicode_ci,
  `rev_4_name` longtext COLLATE utf8mb4_unicode_ci,
  `rev_4_loc` longtext COLLATE utf8mb4_unicode_ci,
  `faq_badge` longtext COLLATE utf8mb4_unicode_ci,
  `faq_title` longtext COLLATE utf8mb4_unicode_ci,
  `faq_1_q` longtext COLLATE utf8mb4_unicode_ci,
  `faq_1_a` longtext COLLATE utf8mb4_unicode_ci,
  `faq_2_q` longtext COLLATE utf8mb4_unicode_ci,
  `faq_2_a` longtext COLLATE utf8mb4_unicode_ci,
  `faq_3_q` longtext COLLATE utf8mb4_unicode_ci,
  `faq_3_a` longtext COLLATE utf8mb4_unicode_ci,
  `faq_4_q` longtext COLLATE utf8mb4_unicode_ci,
  `faq_4_a` longtext COLLATE utf8mb4_unicode_ci,
  `hero_rating` longtext COLLATE utf8mb4_unicode_ci,
  `hero_rating_count` longtext COLLATE utf8mb4_unicode_ci,
  `hero_rating_label` longtext COLLATE utf8mb4_unicode_ci,
  `discount_save_text` longtext COLLATE utf8mb4_unicode_ci,
  `spec_title` longtext COLLATE utf8mb4_unicode_ci,
  `spec_1_label` longtext COLLATE utf8mb4_unicode_ci,
  `spec_1_value` longtext COLLATE utf8mb4_unicode_ci,
  `spec_2_label` longtext COLLATE utf8mb4_unicode_ci,
  `spec_2_value` longtext COLLATE utf8mb4_unicode_ci,
  `spec_3_label` longtext COLLATE utf8mb4_unicode_ci,
  `spec_3_value` longtext COLLATE utf8mb4_unicode_ci,
  `spec_4_label` longtext COLLATE utf8mb4_unicode_ci,
  `spec_4_value` longtext COLLATE utf8mb4_unicode_ci,
  `spec_5_label` longtext COLLATE utf8mb4_unicode_ci,
  `spec_5_value` longtext COLLATE utf8mb4_unicode_ci,
  `spec_6_label` longtext COLLATE utf8mb4_unicode_ci,
  `spec_6_value` longtext COLLATE utf8mb4_unicode_ci,
  `spec_7_label` longtext COLLATE utf8mb4_unicode_ci,
  `spec_7_value` longtext COLLATE utf8mb4_unicode_ci,
  `stock_count` longtext COLLATE utf8mb4_unicode_ci,
  `stock_text` longtext COLLATE utf8mb4_unicode_ci,
  `urgency_title` longtext COLLATE utf8mb4_unicode_ci,
  `urgency_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `final_cta_title` longtext COLLATE utf8mb4_unicode_ci,
  `final_cta_subtitle` longtext COLLATE utf8mb4_unicode_ci,
  `final_cta_btn_text` longtext COLLATE utf8mb4_unicode_ci,
  `footer_company` longtext COLLATE utf8mb4_unicode_ci,
  `footer_email` longtext COLLATE utf8mb4_unicode_ci,
  `footer_copyright` longtext COLLATE utf8mb4_unicode_ci,
  `security_badge_text` longtext COLLATE utf8mb4_unicode_ci,
  `special_feature_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_1_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_1_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sf_2_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_2_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sf_3_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_3_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sf_4_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_4_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sf_5_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_5_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sf_6_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_6_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sf_7_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_7_desc` longtext COLLATE utf8mb4_unicode_ci,
  `sf_8_title` longtext COLLATE utf8mb4_unicode_ci,
  `sf_8_desc` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `landing_pages_product_id_index` (`product_id`),
  KEY `landing_pages_variation_id_index` (`variation_id`),
  KEY `landing_pages_page_type_index` (`page_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `manual_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manual_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Personal',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manual_payments_status_index` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `size` tinyint DEFAULT NULL,
  `variation_id` bigint unsigned DEFAULT NULL,
  `quantity` int unsigned NOT NULL DEFAULT '1',
  `unit_price` decimal(10,2) DEFAULT '0.00',
  `purchase_price` decimal(10,2) DEFAULT '0.00',
  `discount` decimal(10,2) DEFAULT '0.00',
  `is_stock` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_variation_id_index` (`variation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `order_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'cash',
  `amount` decimal(10,2) DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `tnx_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `order_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_group` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `badge_class` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bg-secondary',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `counts_as_active` tinyint(1) NOT NULL DEFAULT '0',
  `counts_as_delivered` tinyint(1) NOT NULL DEFAULT '0',
  `counts_as_cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `counts_as_return` tinyint(1) NOT NULL DEFAULT '0',
  `counts_as_shipped` tinyint(1) NOT NULL DEFAULT '0',
  `marks_payment_paid` tinyint(1) NOT NULL DEFAULT '0',
  `restores_stock` tinyint(1) NOT NULL DEFAULT '0',
  `reduces_stock` tinyint(1) NOT NULL DEFAULT '0',
  `sms_key` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_statuses_name_unique` (`name`),
  UNIQUE KEY `order_statuses_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'due',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `amount` decimal(10,2) DEFAULT '0.00',
  `tax` decimal(10,2) DEFAULT '0.00',
  `discount` decimal(10,2) DEFAULT '0.00',
  `final_amount` decimal(10,2) DEFAULT '0.00',
  `shipping_charge` decimal(10,2) DEFAULT '0.00',
  `delivery_type` tinyint DEFAULT NULL,
  `assign_user_id` bigint unsigned DEFAULT NULL,
  `delivery_charge_id` bigint unsigned DEFAULT NULL,
  `courier_id` bigint unsigned DEFAULT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'BDT',
  `sender_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_tracking_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_attempt` tinyint unsigned NOT NULL DEFAULT '0',
  `order_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utm_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utm_medium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utm_campaign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_index` (`user_id`),
  KEY `orders_assign_user_id_index` (`assign_user_id`),
  KEY `orders_delivery_charge_id_index` (`delivery_charge_id`),
  KEY `orders_courier_id_index` (`courier_id`),
  KEY `orders_transaction_id_index` (`transaction_id`),
  KEY `orders_ip_address_index` (`ip_address`),
  KEY `orders_courier_tracking_id_index` (`courier_tracking_id`),
  KEY `orders_courier_tracking_code_index` (`courier_tracking_code`),
  KEY `orders_order_source_index` (`order_source`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `other_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `other_expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `other_expenses_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_page_unique` (`page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `popular_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `popular_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `popular_categories_category_id_unique` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` tinyint unsigned NOT NULL DEFAULT '5',
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_product_id_index` (`product_id`),
  KEY `product_reviews_user_id_index` (`user_id`),
  KEY `product_reviews_status_index` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `product_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_sizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `size_id` tinyint NOT NULL,
  `product_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `product_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` mediumint NOT NULL,
  `size_id` tinyint NOT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `variation_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_stocks_variation_id_index` (`variation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` smallint NOT NULL,
  `purchase_price` decimal(8,2) DEFAULT '0.00',
  `purchase_prices` decimal(12,2) DEFAULT '0.00',
  `sell_price` decimal(8,2) DEFAULT '0.00',
  `is_for_you` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'single',
  `sub_category_id` bigint unsigned DEFAULT NULL,
  `type_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `feature` longtext COLLATE utf8mb4_unicode_ci,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` decimal(12,2) DEFAULT NULL,
  `is_stock` tinyint(1) NOT NULL DEFAULT '1',
  `stock_quantity` int NOT NULL DEFAULT '0',
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_video_active` tinyint(1) NOT NULL DEFAULT '1',
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dicount_amount` decimal(12,2) DEFAULT NULL,
  `after_discount` decimal(12,2) DEFAULT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_recommended` tinyint(1) DEFAULT NULL,
  `priority` int unsigned DEFAULT NULL,
  `is_free_shipping` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_is_for_you_index` (`is_for_you`),
  KEY `products_sub_category_id_index` (`sub_category_id`),
  KEY `products_type_id_index` (`type_id`),
  KEY `products_user_id_index` (`user_id`),
  KEY `products_sku_index` (`sku`),
  KEY `products_status_index` (`status`),
  KEY `products_is_recommended_index` (`is_recommended`),
  KEY `products_priority_index` (`priority`),
  KEY `products_is_free_shipping_index` (`is_free_shipping`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `profit_calculations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profit_calculations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `cost_price` decimal(14,2) NOT NULL DEFAULT '0.00',
  `selling_price` decimal(14,2) NOT NULL DEFAULT '0.00',
  `marketing_cost` decimal(14,2) NOT NULL DEFAULT '0.00',
  `shipping_cost` decimal(14,2) NOT NULL DEFAULT '0.00',
  `extra_shipping_profit` decimal(14,2) NOT NULL DEFAULT '0.00',
  `per_return_loss` decimal(14,2) NOT NULL DEFAULT '0.00',
  `quantity` int unsigned NOT NULL DEFAULT '0',
  `return_percentage` decimal(6,2) NOT NULL DEFAULT '0.00',
  `call_cancel_percentage` decimal(6,2) NOT NULL DEFAULT '0.00',
  `target_delivered_units` int unsigned NOT NULL DEFAULT '0',
  `net_profit` decimal(14,2) NOT NULL DEFAULT '0.00',
  `gross_profit` decimal(14,2) NOT NULL DEFAULT '0.00',
  `total_selling` decimal(14,2) NOT NULL DEFAULT '0.00',
  `total_cost` decimal(14,2) NOT NULL DEFAULT '0.00',
  `profit_margin` decimal(8,2) NOT NULL DEFAULT '0.00',
  `roi` decimal(8,2) NOT NULL DEFAULT '0.00',
  `sold_units` decimal(12,2) NOT NULL DEFAULT '0.00',
  `return_units` decimal(12,2) NOT NULL DEFAULT '0.00',
  `health_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'loss',
  `is_favorite` tinyint(1) NOT NULL DEFAULT '0',
  `formula_version` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'v1.1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profit_calculations_user_id_index` (`user_id`),
  KEY `profit_calculations_is_favorite_index` (`is_favorite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `purchase_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_lines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint NOT NULL,
  `size_id` tinyint NOT NULL,
  `product_id` mediumint NOT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `purchase_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` mediumint NOT NULL,
  `date` date DEFAULT NULL,
  `method` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` smallint DEFAULT NULL,
  `user_id` smallint DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `ref` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `review_product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review_product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `landing_page_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `review_product_images_landing_page_id_index` (`landing_page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `social_icons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social_icons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_top` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `types_is_top_index` (`is_top`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_seller` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_mobile_unique` (`mobile`),
  KEY `users_status_index` (`status`),
  KEY `users_is_seller_index` (`is_seller`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `variations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `size_id` tinyint DEFAULT NULL,
  `color_id` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `after_discount_price` decimal(12,2) DEFAULT NULL,
  `stock_quantity` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4,'2019_12_14_000001_create_personal_access_tokens_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5,'2022_09_21_061530_create_products_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6,'2022_09_21_105808_create_sliders_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7,'2022_09_21_105823_create_categories_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2022_09_21_110337_add_title_to_sliders_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9,'2022_09_22_073647_add_image_to_categories_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10,'2022_09_27_092211_create_orders_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11,'2022_09_27_092410_create_order_details_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12,'2022_09_27_092547_create_order_payments_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13,'2022_09_28_152539_create_types_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14,'2022_09_28_152648_create_sizes_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15,'2022_09_28_152701_create_product_sizes_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16,'2022_10_13_111702_create_home_section_images_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2022_10_14_104010_create_purchase_payments_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18,'2022_10_14_104112_create_purchases_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19,'2022_10_14_104348_create_purchase_lines_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20,'2022_10_14_105435_create_product_stocks_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21,'2022_10_14_120042_create_suppliers_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22,'2022_10_19_115117_create_permission_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (23,'2022_10_24_114941_create_about_us_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (24,'2022_10_24_120601_create_careers_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (25,'2022_10_25_173552_create_social_icons_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (26,'2022_10_27_123708_create_combos_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (27,'2022_10_27_123729_create_combo_products_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (28,'2022_11_11_150834_create_product_images_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (29,'2022_11_20_001912_create_colors_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (30,'2022_11_20_002214_create_variations_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (31,'2022_11_24_224227_create_contacts_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (32,'2022_12_17_134049_create_couriers_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (33,'2026_06_24_130000_create_profit_calculations_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (34,'2026_07_27_000000_create_order_statuses_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (35,'2026_08_02_000000_create_dynamic_landing_page_builder_foundation',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (36,'2026_08_02_010000_create_dynamic_landing_action_attempts_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (37,'2026_08_02_020000_create_dynamic_landing_page_versions_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (38,'2026_08_02_030000_create_dynamic_landing_saved_sections_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (39,'2026_08_02_040000_harden_dynamic_landing_action_attempts_for_snapshots',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (40,'2026_08_03_000000_seed_bari12_dynamic_landing_page_components',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (41,'2026_08_10_000000_add_trash_order_status',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (42,'2026_09_21_000000_replace_green_seed_branding_with_insafstitch',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (43,'2026_09_21_010000_replace_dynamic_landing_component_images_with_placeholder',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (44,'2026_09_22_000000_replace_insafstitch_with_trizync_solution',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (45,'2026_09_22_010000_create_blocked_ips_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (46,'2026_09_22_020000_add_navigation_fields_to_categories_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (47,'2026_09_22_030000_complete_storefront_schema',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (48,'2026_09_22_040000_create_missing_storefront_support_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (49,'2026_09_22_050000_create_ui_text_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (50,'2026_09_22_060000_complete_users_authentication_schema',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (51,'2026_09_22_070000_seed_admin_permissions',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (52,'2026_09_22_071000_limit_admin_to_bootstrap_permissions',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (53,'2026_09_22_080000_complete_order_schema',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (54,'2026_09_22_090000_create_remaining_application_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (55,'2026_09_22_100000_complete_configuration_columns',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (56,'2026_09_22_110000_complete_slider_schema',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (57,'2026_09_22_120000_add_purchase_prices_to_products_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (58,'2026_09_22_121000_add_is_for_you_to_products_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (59,'2026_09_22_130000_create_queue_tables',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (60,'2026_09_22_140000_complete_checkout_order_schema',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (61,'2026_09_22_150000_add_auto_assignment_settings',1);
