# Laravel 12 E-Commerce Web Application

## Description
A simple Laravel 12 e-commerce application using **session-based authentication**, **Bootstrap 5**, **custom middleware (no Kernel.php)**, and **separate Admin & Customer panels**.

---

## Features

### Admin
- Login / Logout
- Dashboard
- Product CRUD (Soft Delete)
- Manage product quantity & availability
- View customers
- View invoices
- Update invoice status (Pending / Completed / Cancelled)

### Customer
- Register / Login / Logout
- Dashboard
- Edit profile
- Add to cart
- Place order
- View invoices
- Download invoice PDF
- Soft delete account

---

## Tech Stack
- Laravel 12
- PHP 8+
- MySQL
- Bootstrap 5
- Blade
- Session Authentication
- Eloquent ORM
- Soft Deletes

---

## Folder Structure

app/
└── Http/
├── Controllers/
│ ├── Admin/
│ └── Customer/
├── Middleware/
│ ├── AdminAuth.php
│ └── CustomerAuth.php

resources/
└── views/
├── admin/
└── customer/


---

## Database Tables

### products
- id
- product_name
- product_detail
- product_image
- product_price
- product_quantity
- product_category
- deleted_at

### customers
- id
- name
- email
- phone
- password
- deleted_at

### orders
- id
- customer_id
- product_id
- quantity

### invoices
- id
- customer_id
- status

---

## Installation

```bash
git clone https://github.com/your-username/laravel-ecommerce.git
cd laravel-ecommerce
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
