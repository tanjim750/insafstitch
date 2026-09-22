# Insaf Stitch / Greenseed - E-Commerce & Dynamic Landing Page Platform

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.2-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

A high-performance, full-stack E-Commerce and Dynamic Landing Page platform developed by **Trizync Solution**. Built on top of **Laravel 11**, **MySQL**, and **Vite**, this application provides complete end-to-end e-commerce functionality, dynamic landing page builder capabilities, integrated order fulfillment with local Bangladeshi couriers, multi-gateway payments, and real-time financial profit analytics.

---

## 🚀 Key Features

### 🛒 E-Commerce & Product Catalog
- **Product Management:** Multi-attribute support (colors, sizes, types, categories, subcategories) and inventory stock control.
- **Product Variations:** Support for multi-variant pricing, image galleries, discount pricing, and promotional tags.
- **Customer Frontend:** Modern responsive shopping experience, product search, categories navigation, wishlist, shopping cart, and quick checkout.

### 🎨 Dynamic Landing Page Engine & Builder
- **Visual Component Builder:** Drag-and-drop landing page engine with modular sections (hero sliders, checkout sections, feature cards, social proof).
- **Publication & Version Control:** Version snapshot history, component catalog resolvers, theme customizer, and page caching.
- **Lead Capture & Direct Checkout:** Integrated inline checkout forms directly within landing pages to optimize conversion rates.
- **Pixel & Event Tracking:** Native integration with Meta Pixel (Facebook Conversion API) and custom analytics events for campaign tracking.

### 🚚 Order Processing & Courier Integrations
- **Order Lifecycle Management:** Multi-status order management pipeline (Pending, Processing, Shipped, Delivered, Cancelled, Trash).
- **Automated Courier Dispatch:** Direct API integrations for courier consignment booking and status tracking:
  - **Steadfast Courier**
  - **Pathao Courier**
  - **RedX Courier**
  - **Paperfly Courier**
- **Bulk Operations:** Bulk order status updates, packing slip printing, invoice generation, and Excel data export.

### 💳 Payment Gateway Ecosystem
- **Local & International Gateways:**
  - **SSLCommerz** (Debit/Credit Cards, Mobile Banking)
  - **bKash Direct Gateway**
  - **Nagad Gateway**
  - **EPS** (Easy Payment System)
  - **UddoktaPay**
  - **Stripe**
- **Cash & Manual Payments:** Cash on Delivery (COD), Manual Bank Transfers, and Direct POS/Cash Sales.

### 📊 Financial Analytics & Profit Calculator
- **Automated Profit & Loss Tracking:** Dedicated engine calculating net and gross profit per order and overall business timeline (`ProfitCalculatorService`).
- **Expense Management:** Track ad expenses (Facebook/Google campaign costs), overhead expenses, and inventory purchase expenses.
- **Real-Time Analytics Dashboard:** Key performance metrics, daily sales velocity, operational expense breakdowns, and inventory alerts.

### 🛡️ Security, Governance & Admin Tools
- **Role-Based Access Control (RBAC):** Granular user permissions powered by Spatie `laravel-permission`.
- **Activity Logs:** Comprehensive system audit trails tracking admin actions and order modifications (`ActivityLogController`).
- **IP Blocking System:** Built-in security suite to ban suspicious IP addresses (`IPBlockController`).
- **Bilingual Interface:** Built-in localization management supporting English and Bangla content adjustments.

---

## 🛠️ Technology Stack

| Layer | Technology |
| :--- | :--- |
| **Backend Framework** | PHP 8.2+, Laravel 11.x |
| **Database** | MySQL 8.0+ |
| **Authentication & AuthZ** | Laravel Sanctum, Spatie Laravel-Permission |
| **Frontend Assets** | Vite 3.x, Bootstrap 5.2, Sass, jQuery |
| **Export Utilities** | Maatwebsite Excel 3.1 |
| **Image Processing** | Intervention Image 2.7 |

---

## 📁 Project Architecture

```
insafsitch/
├── app/
│   ├── Console/Commands/       # Custom CLI commands (e.g. app:create-superuser, cache:sweep)
│   ├── Http/Controllers/
│   │   ├── Backend/            # Admin controllers (Orders, Products, Landing Pages, Reports, Expenses)
│   │   └── Frontend/           # Customer controllers (Checkout, Cart, Payments, Account)
│   ├── Models/                 # Eloquent ORM Models (Product, Order, DynamicLandingPage, ProfitCalculation, etc.)
│   └── Services/
│       ├── Landing/            # Dynamic Landing Page builder engine & component resolvers
│       ├── FacebookConversionService.php # Facebook CAPI integration
│       └── ProfitCalculatorService.php   # Net profit calculation engine
├── config/                     # Application & service configuration files
├── database/
│   ├── schema/mysql-schema.sql # Consolidated production database schema
│   ├── seeders/                # Baseline system seeds (Roles, Permissions, Statuses, Settings)
│   └── migrations/             # Incremental database migrations
├── docs/
│   └── page_builder/           # Architecture and implementation guides for the Landing Page Engine
├── resources/
│   ├── js/                     # Frontend JS modules and components
│   ├── sass/                   # Custom styling assets
│   └── views/                  # Blade templates (Backend dashboard & Frontend store)
├── routes/
│   ├── web.php                 # Core web, admin dashboard, and checkout routes
│   └── api.php                 # External & API endpoints
└── stitch/                     # UI reference screenshots and HTML design templates
```

---

## ⚙️ Environment Setup & Installation

### Prerequisites
- **PHP:** `^8.2` (Extensions required: `pdo_mysql`, `mbstring`, `openssl`, `curl`, `gd` / `imagick`)
- **Composer:** `^2.x`
- **Node.js:** `^18.x` or `^20.x` & `npm`
- **Database:** MySQL `^8.0` or MariaDB `^10.5`

### 1. Repository Setup & Dependencies
Clone the repository and install dependencies:

```bash
git clone <repository-url> insafsitch
cd insafsitch

# Install PHP dependencies
composer install

# Install Frontend dependencies
npm install
```

### 2. Environment Configuration
Copy the example `.env` file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database and credentials in `.env`:
```env
APP_NAME="Insaf Stitch"
APP_ENV=local
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=insaf_stitch
DB_USERNAME=root
DB_PASSWORD=

# Courier API Credentials (Optional / Production)
STEADFAST_MERCHANT_ID=your_steadfast_id
STEADFAST_SLIP_BUSINESS_NAME="Your Store Name"
```

### 3. Database Initialization
The project uses a consolidated MySQL schema for fresh installations.

```bash
# Clear any cached configuration
php artisan config:clear

# Execute database migrations and seed baseline operational defaults
php artisan migrate --seed
```

> **Note:** The seeder creates operational defaults (settings, order statuses, permissions, default size/color values, couriers, and delivery charges) without injecting dummy products or orders.

### 4. Create Administrative User
Use the custom Artisan CLI command to create a superuser admin account:

```bash
php artisan app:create-superuser
```
Follow the interactive prompt to set the admin name, email, and password.

### 5. Link Storage & Compile Assets
```bash
# Create symbolic link for public file access (product images, sliders, upload files)
php artisan storage:link

# Compile frontend assets for development
npm run dev
```

### 6. Run the Local Development Server
```bash
php artisan serve
```
Access the application at `http://localhost:8000`.

---

## 🖥️ Custom CLI Commands

| Command | Description |
| :--- | :--- |
| `php artisan app:create-superuser` | Creates an admin user with super-administrator privileges. |
| `php artisan cache:sweep` | Clears system application caches, compiled views, and route caches. |

---

## 📄 License & Credits

Developed by **Trizync Solution**. All rights reserved. Framework components governed under the [MIT License](LICENSE).
