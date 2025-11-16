# Hospital Appointment System - Setup Guide

## 📋 Project Overview

A complete **Laravel Hospital Management System** with frontend Blade templates for managing appointments, doctors, patients, and staff across different roles.

### ✨ Features

- **Home Page** with role selection (Public, Admin, Doctor, Frontdesk)
- **Public Booking Wizard** (4-step appointment booking)
- **Admin Dashboard** (manage appointments, doctors, patients, calendar)
- **Doctor Portal** (view appointments, schedule, patient details)
- **Frontdesk Panel** (quick booking, doctor schedules, patient records)
- **Responsive Design** (Tailwind CSS via CDN)
- **Role-based Layouts** (separate layouts for each role)

---

## 🚀 Quick Start

### Prerequisites

- **PHP** >= 8.1
- **Composer** (latest)
- **MySQL/PostgreSQL/SQLite** (optional, for database features)
- **Node.js** & **npm** (for assets compilation)

### Installation Steps

```bash
# 1. Clone or navigate to project directory
cd /home/user/hospital-appointment-system

# 2. Install PHP dependencies
composer install

# 3. Install JavaScript dependencies
npm install

# 4. Copy environment file (already done)
# .env file already exists

# 5. Generate application key
php artisan key:generate

# 6. (Optional) Configure database in .env
# Edit .env and set DB_CONNECTION, DB_DATABASE, etc.

# 7. (Optional) Run migrations
php artisan migrate

# 8. Compile assets
npm run dev
# OR for production:
npm run build

# 9. Start development server
php artisan serve
```

### Access the Application

```
http://localhost:8000/              # Home page
http://localhost:8000/login         # Login page
http://localhost:8000/booking       # Public booking
http://localhost:8000/admin/dashboard     # Admin panel
http://localhost:8000/doctor/dashboard    # Doctor portal
http://localhost:8000/frontdesk/dashboard # Frontdesk
```

---

## 📁 Project Structure

```
├── app/                          # Laravel application code
│   ├── Http/Controllers/         # Controllers (currently empty)
│   ├── Models/                   # Eloquent models
│   └── Providers/                # Service providers
├── config/                       # Configuration files
├── database/                     # Migrations, seeders, factories
│   ├── migrations/               # Database migrations
│   └── seeders/                  # Database seeders
├── public/                       # Public assets
│   └── index.php                 # Application entry point
├── resources/                    # Views and assets
│   ├── css/
│   │   └── app.css               # Custom CSS
│   ├── js/
│   │   └── app.js                # JavaScript entry point
│   └── views/                    # Blade templates
│       ├── welcome.blade.php     # Home page
│       ├── layouts/              # Master layouts
│       │   ├── admin.blade.php
│       │   ├── doctor.blade.php
│       │   ├── frontdesk.blade.php
│       │   └── public.blade.php
│       ├── auth/
│       │   └── login.blade.php
│       ├── public/
│       │   ├── booking.blade.php
│       │   └── partials/
│       │       ├── booking-step1.blade.php
│       │       ├── booking-step2.blade.php
│       │       ├── booking-step3.blade.php
│       │       └── booking-step4.blade.php
│       ├── admin/                # 7 admin pages
│       ├── doctor/               # 4 doctor pages
│       └── frontdesk/            # 5 frontdesk pages
├── routes/
│   └── web.php                   # Web routes (18 routes)
├── storage/                      # Storage for logs, cache, etc.
├── tests/                        # PHPUnit tests
├── .env                          # Environment configuration
├── .env.example                  # Example environment file
├── artisan                       # Laravel CLI
├── composer.json                 # PHP dependencies
└── package.json                  # Node dependencies
```

---

## 🗺️ Routes

### **Total: 18 Routes**

#### Home & Authentication
```php
GET /              → welcome (home page with role cards)
GET /login         → auth.login
```

#### Public Booking (Single Route)
```php
GET /booking       → public.booking
  ?step=1  # Select Doctor (default)
  ?step=2  # Select Date & Time
  ?step=3  # Patient Details
  ?step=4  # Confirmation
```

#### Admin Panel (7 routes)
```php
GET /admin/dashboard
GET /admin/appointments
GET /admin/appointments/add
GET /admin/doctors
GET /admin/doctors/add
GET /admin/patients
GET /admin/calendar
```

#### Doctor Portal (4 routes)
```php
GET /doctor/dashboard
GET /doctor/appointments
GET /doctor/appointments/{id}
GET /doctor/calendar
```

#### Frontdesk (5 routes)
```php
GET /frontdesk/dashboard
GET /frontdesk/add-appointment
GET /frontdesk/doctor-schedule
GET /frontdesk/patients
GET /frontdesk/history
```

---

## 🎨 Design System

- **Framework**: Tailwind CSS (loaded via CDN in layouts)
- **Font**: Inter (Google Fonts)
- **Primary Color**: Sky Blue (#0ea5e9)
- **Layout**: Sidebar + Main Content for dashboards
- **Icons**: Inline SVG (Heroicons style)

---

## 📄 Blade Templates

### **Total: 26 Blade Templates**

| Category | Count | Description |
|----------|-------|-------------|
| **Layouts** | 4 | Master templates for each role |
| **Home & Auth** | 2 | Welcome page, Login |
| **Public Booking** | 5 | Main booking + 4 step partials |
| **Admin** | 7 | Dashboard, appointments, doctors, patients, calendar |
| **Doctor** | 4 | Dashboard, appointments, appointment details, calendar |
| **Frontdesk** | 5 | Dashboard, add appointment, schedule, patients, history |

### Layout Usage

Each layout provides:
- **Sidebar navigation** (auto-highlights active page)
- **Header** with user info
- **Content area** (@yield)
- **Tailwind CSS** via CDN

Example:
```blade
@extends('layouts.admin')

@section('title', 'Page Title')
@section('page-title', 'Dashboard')

@section('header-actions')
    <button>+ Add New</button>
@endsection

@section('content')
    <!-- Your content -->
@endsection
```

---

## ⚙️ Configuration

### Database Configuration

Edit `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospital_db
DB_USERNAME=root
DB_PASSWORD=
```

For SQLite (no installation needed):
```env
DB_CONNECTION=sqlite
DB_DATABASE=/home/user/hospital-appointment-system/database/database.sqlite
```

Then create the database:
```bash
touch database/database.sqlite
php artisan migrate
```

### Application Configuration

`.env` settings:
```env
APP_NAME="MediCare HMS"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
```

---

## 🔧 Development

### Running the Development Server

```bash
# Laravel development server
php artisan serve

# On custom port
php artisan serve --port=8080

# With hot reload (Vite)
npm run dev
```

### Compiling Assets

```bash
# Development (with watch)
npm run dev

# Production build
npm run build
```

### Clearing Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 🚧 Current Status

### ✅ Completed
- Laravel 11 installation
- 26 Blade templates
- 4 role-based layouts
- 18 routes configured
- Home page with role selection
- Single-route booking wizard
- Responsive UI with Tailwind CSS

### ❌ Not Implemented (Future Work)
- Database migrations (users, doctors, patients, appointments)
- Controllers (using route closures currently)
- Authentication system (Laravel Breeze/Jetstream)
- Authorization middleware (role-based access)
- Form validation
- CRUD operations
- File uploads
- Email notifications
- API endpoints
- Testing suite

---

## 🎯 Next Steps

### Phase 1: Database Setup
1. Create migrations for all tables
2. Create Eloquent models with relationships
3. Create seeders for sample data

### Phase 2: Authentication
1. Install Laravel Breeze or Jetstream
2. Add role field to users table
3. Create middleware for role-based access
4. Connect login form to authentication

### Phase 3: Controllers
1. Create controllers for each module
2. Move route logic to controllers
3. Implement CRUD operations

### Phase 4: Forms & Validation
1. Add CSRF tokens to all forms
2. Create Form Request classes for validation
3. Implement backend form processing

### Phase 5: Advanced Features
1. Real-time notifications
2. Calendar integration
3. File uploads for documents
4. Email/SMS notifications
5. Reporting and analytics

---

## 📝 Useful Commands

### Artisan Commands

```bash
# List all routes
php artisan route:list

# Create a new controller
php artisan make:controller AppointmentController

# Create a new model with migration
php artisan make:model Doctor -m

# Create a new migration
php artisan make:migration create_appointments_table

# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Create a seeder
php artisan make:seeder DoctorSeeder

# Run seeders
php artisan db:seed
```

### Composer Commands

```bash
# Install dependencies
composer install

# Update dependencies
composer update

# Autoload classes
composer dump-autoload
```

---

## 🐛 Troubleshooting

### Common Issues

**1. "vendor/autoload.php not found"**
```bash
composer install
```

**2. "Application key not set"**
```bash
php artisan key:generate
```

**3. "Class not found"**
```bash
composer dump-autoload
```

**4. "Permission denied" errors**
```bash
chmod -R 775 storage bootstrap/cache
```

**5. Tailwind CSS not loading**
- Tailwind is loaded via CDN in layouts
- No build step required for Tailwind

**6. Routes not working**
```bash
php artisan route:cache
php artisan config:cache
```

---

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Blade Templates](https://laravel.com/docs/blade)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze) (for authentication)

---

## 📧 Support

For issues or questions:
1. Check the troubleshooting section above
2. Review Laravel documentation
3. Check that all dependencies are installed

---

## 🎉 Features Summary

| Feature | Status |
|---------|--------|
| ✅ Home Page | Complete |
| ✅ Login Page | Complete (UI only) |
| ✅ Public Booking | Complete (UI only) |
| ✅ Admin Dashboard | Complete (UI only) |
| ✅ Doctor Portal | Complete (UI only) |
| ✅ Frontdesk Panel | Complete (UI only) |
| ✅ Responsive Design | Complete |
| ❌ Authentication | Not implemented |
| ❌ Database | Not implemented |
| ❌ Form Processing | Not implemented |
| ❌ File Uploads | Not implemented |
| ❌ Notifications | Not implemented |

---

**Current Version**: Frontend Complete | Backend Not Implemented
**Last Updated**: November 16, 2025
