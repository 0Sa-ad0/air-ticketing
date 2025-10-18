# ✈️ Air Ticketing Platform

A comprehensive flight booking and ticketing platform built with **PHP Laravel**. This system enables aviation offices (Admin) to manage flight schedules and passenger selection, while allowing users (Passengers) to apply for flights, upload documents, and complete payments online.

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple)

---

## 📋 Table of Contents

- [Features](#-features)
- [System Requirements](#-system-requirements)
- [Installation](#-installation)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [Screenshots](#-screenshots)
- [API Endpoints](#-api-endpoints)
- [Security](#-security)
- [Contributing](#-contributing)
- [License](#-license)

---

## ✨ Features

### 👤 User Features
- ✅ User registration and authentication
- ✅ Browse available flights
- ✅ Apply for flights
- ✅ View application status (Pending, Shortlisted, Final, Paid)
- ✅ Upload required documents (PDF, JPEG, PNG)
- ✅ Make online payments
- ✅ Track application timeline
- ✅ Mobile-responsive design

### 🔐 Admin Features
- ✅ Secure admin panel
- ✅ Flight schedule management (Create, Read, Update, Delete)
- ✅ Open/Close flight applications
- ✅ View all applicants per flight
- ✅ Shortlist applicants
- ✅ Publish shortlisted candidates
- ✅ Finalize passenger list
- ✅ View uploaded documents
- ✅ Approve/Reject payments
- ✅ Export passenger list (CSV)
- ✅ Dashboard with statistics

---

## 💻 System Requirements

- **PHP:** 8.1 or higher
- **Composer:** Latest version
- **MySQL:** 8.0 or higher
- **Web Server:** Apache/Nginx
- **Extensions:** 
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
  - Fileinfo

---

## 🚀 Installation

### Method 1: Automatic Setup (Recommended)

1. **Clone or create Laravel project:**
```bash
composer create-project laravel/laravel air-ticketing
cd air-ticketing
```

2. **Copy all provided files** to their respective directories

3. **Run the setup script:**
```bash
chmod +x setup.sh
./setup.sh
```

4. **Start the server:**
```bash
php artisan serve
```

### Method 2: Manual Setup

1. **Create Laravel Project:**
```bash
composer create-project laravel/laravel air-ticketing
cd air-ticketing
```

2. **Configure Environment:**
```bash
cp .env.example .env
php artisan key:generate
```

3. **Edit `.env` file:**
```env
DB_DATABASE=air_ticketing
DB_USERNAME=root
DB_PASSWORD=your_password
```

4. **Create Database:**
```sql
CREATE DATABASE air_ticketing;
```

5. **Copy All Files:**
   - Migration files → `database/migrations/`
   - Models → `app/Models/`
   - Controllers → `app/Http/Controllers/`
   - Middleware → `app/Http/Middleware/`
   - Policies → `app/Policies/`
   - Views → `resources/views/`
   - Routes → `routes/web.php`
   - Seeder → `database/seeders/DatabaseSeeder.php`
   - Update `app/Http/Kernel.php`
   - Update `app/Providers/AuthServiceProvider.php`

6. **Install Dependencies:**
```bash
composer install
```

7. **Run Migrations & Seed:**
```bash
php artisan migrate
php artisan db:seed
```

8. **Create Storage Link:**
```bash
php artisan storage:link
```

9. **Set Permissions (Linux/Mac):**
```bash
chmod -R 775 storage bootstrap/cache
```

10. **Start Development Server:**
```bash
php artisan serve
```

---

## 🎯 Usage

### Accessing the Application

- **Homepage:** http://localhost:8000
- **Admin Panel:** http://localhost:8000/admin/dashboard

### Default Credentials

#### Admin Account
- **Email:** admin@example.com
- **Password:** password

#### Sample User Accounts
- **Email:** john@example.com / **Password:** password
- **Email:** jane@example.com / **Password:** password

### User Workflow

1. **Register/Login** → Create account or sign in
2. **Browse Flights** → View available flights
3. **Apply** → Submit application for desired flight
4. **Wait for Shortlist** → Admin reviews and shortlists
5. **Upload Documents** → Upload required documents after shortlisting
6. **Final Selection** → Admin finalizes passenger list
7. **Make Payment** → Submit payment with transaction reference
8. **Confirmation** → Admin approves payment

### Admin Workflow

1. **Login** → Access admin panel
2. **Create Flight** → Add new flight schedule
3. **Open Applications** → Allow users to apply
4. **Review Applications** → View all applicants
5. **Shortlist** → Mark suitable candidates
6. **Publish Shortlist** → Notify shortlisted users
7. **Review Documents** → Check uploaded documents
8. **Finalize List** → Select final passengers
9. **Verify Payments** → Approve/Reject payment submissions
10. **Export Data** → Download passenger list

---

## 📁 Project Structure

```
air-ticketing/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin controllers
│   │   │   ├── Auth/               # Authentication controllers
│   │   │   └── ...                 # User controllers
│   │   ├── Middleware/
│   │   │   └── AdminMiddleware.php # Admin access control
│   │   └── Kernel.php              # Middleware registration
│   │
│   ├── Models/                     # Eloquent models
│   │   ├── User.php
│   │   ├── Flight.php
│   │   ├── Application.php
│   │   ├── Document.php
│   │   └── Payment.php
│   │
│   ├── Policies/                   # Authorization policies
│   │   ├── ApplicationPolicy.php
│   │   └── DocumentPolicy.php
│   │
│   └── Providers/
│       └── AuthServiceProvider.php  # Policy registration
│
├── database/
│   ├── migrations/                 # Database migrations
│   └── seeders/                    # Database seeders
│
├── resources/
│   └── views/                      # Blade templates
│       ├── layouts/
│       ├── auth/
│       ├── flights/
│       ├── applications/
│       ├── documents/
│       ├── payments/
│       └── admin/
│
├── routes/
│   └── web.php                     # Web routes
│
└── storage/
    └── app/
        └── public/
            └── documents/          # Uploaded files
```

---

## 🖼️ Screenshots

### User Interface
- Modern, responsive design
- Mobile-friendly browsing
- Intuitive navigation
- Clean card-based layout

### Admin Panel
- Professional dashboard
- Easy-to-use management interface
- Comprehensive filtering options
- Quick action buttons

---

## 🔗 API Endpoints / Routes

### Public Routes
```
GET  /                      - Homepage
GET  /flights               - View all flights
GET  /flights/{id}          - View flight details
GET  /login                 - Login page
POST /login                 - Process login
GET  /register              - Registration page
POST /register              - Process registration
POST /logout                - Logout
```

### User Routes (Authenticated)
```
GET  /applications                      - My applications
POST /flights/{flight}/apply            - Apply for flight
GET  /applications/{application}        - Application details
GET  /applications/{application}/documents  - Upload documents
POST /applications/{application}/documents - Store documents
GET  /applications/{application}/payment   - Payment page
POST /applications/{application}/payment  - Submit payment
```

### Admin Routes (Admin Only)
```
GET  /admin/dashboard              - Admin dashboard
GET  /admin/flights                - List flights
GET  /admin/flights/create         - Create flight form
POST /admin/flights                - Store flight
GET  /admin/flights/{id}/edit      - Edit flight form
PUT  /admin/flights/{id}           - Update flight
DELETE /admin/flights/{id}         - Delete flight
POST /admin/flights/{id}/toggle-status  - Toggle flight status
POST /admin/flights/{id}/publish-shortlist - Publish shortlist
POST /admin/flights/{id}/publish-final - Publish final list
GET  /admin/flights/{id}/export    - Export passenger list

GET  /admin/applications           - List applications
GET  /admin/applications/{id}      - View application
POST /admin/applications/{id}/shortlist - Shortlist application
POST /admin/applications/{id}/finalize - Finalize application

GET  /admin/payments               - List payments
POST /admin/payments/{id}/approve  - Approve payment
POST /admin/payments/{id}/reject   - Reject payment
```

---

## 🔒 Security Features

- ✅ **CSRF Protection** - All forms protected
- ✅ **XSS Prevention** - Blade template escaping
- ✅ **SQL Injection Protection** - Eloquent ORM
- ✅ **Password Hashing** - Bcrypt encryption
- ✅ **Authentication** - Laravel's built-in auth
- ✅ **Authorization** - Policy-based access control
- ✅ **File Upload Validation** - Strict mime type checking
- ✅ **Admin Middleware** - Protected admin routes

---

## 🛠️ Configuration

### File Upload Limits

Edit `php.ini`:
```ini
upload_max_filesize = 10M
post_max_size = 10M
```

### Session Lifetime

Edit `.env`:
```env
SESSION_LIFETIME=120
```

### Mail Configuration

Edit `.env` for email notifications:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

---

## 📊 Database Schema

### Tables
- **users** - User accounts (admin/user)
- **flights** - Flight schedules
- **applications** - Flight applications
- **documents** - Uploaded documents
- **payments** - Payment records

### Relationships
- User `hasMany` Applications
- Flight `hasMany` Applications
- Application `belongsTo` User
- Application `belongsTo` Flight
- Application `hasMany` Documents
- Application `hasOne` Payment

---

## 🐛 Troubleshooting

### Common Issues

**Issue:** 404 Not Found
```bash
php artisan route:clear
php artisan config:clear
```

**Issue:** Storage link not working
```bash
php artisan storage:link
```

**Issue:** Permission denied
```bash
chmod -R 775 storage bootstrap/cache
```

**Issue:** CSRF token mismatch
```bash
php artisan cache:clear
php artisan session:clear
```

---

## 🚀 Deployment

### Production Checklist

- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Configure proper database credentials
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Set proper file permissions
- [ ] Enable HTTPS
- [ ] Change default passwords
- [ ] Configure backup system

---

## 📝 License

This project is open-source and available under the MIT License.

---

## 👥 Support

For issues or questions:
- Check the installation guide
- Review Laravel documentation
- Check application logs: `storage/logs/laravel.log`

---

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com)
- Styled with [Bootstrap](https://getbootstrap.com)
- Icons from [Bootstrap Icons](https://icons.getbootstrap.com)

---

**Developed with ❤️ for Aviation Management**