# Laravel Blade Templates - Hospital Appointment System

This document describes the Laravel Blade template structure created for the Hospital Management System.

## 📁 Project Structure

```
resources/views/
├── welcome.blade.php          # Home page with role selection
├── layouts/
│   ├── admin.blade.php        # Admin panel layout
│   ├── doctor.blade.php       # Doctor portal layout
│   ├── frontdesk.blade.php    # Front desk layout
│   └── public.blade.php       # Public-facing layout
├── auth/
│   └── login.blade.php        # Login page
├── public/
│   ├── booking.blade.php      # Booking wizard controller (handles all steps)
│   └── partials/
│       ├── booking-step1.blade.php    # Step 1: Select Doctor
│       ├── booking-step2.blade.php    # Step 2: Select Date & Time
│       ├── booking-step3.blade.php    # Step 3: Patient Details
│       └── booking-step4.blade.php    # Step 4: Confirmation
├── admin/
│   ├── dashboard.blade.php        # Admin dashboard
│   ├── appointments.blade.php     # Appointments management
│   ├── add-appointment.blade.php  # Add new appointment
│   ├── doctors.blade.php          # Doctors management
│   ├── doctor-add.blade.php       # Add/edit doctor
│   ├── patients.blade.php         # Patients management
│   └── calendar.blade.php         # Calendar view
├── doctor/
│   ├── dashboard.blade.php        # Doctor dashboard
│   ├── appointments.blade.php     # Doctor's appointments list
│   ├── appointment-details.blade.php  # Detailed appointment view
│   └── calendar.blade.php         # Doctor's schedule
└── frontdesk/
    ├── dashboard.blade.php        # Front desk dashboard
    ├── add-appointment.blade.php  # Quick appointment booking
    ├── doctor-schedule.blade.php  # View all doctors' schedules
    ├── patients.blade.php         # View patients (read-only)
    └── history.blade.php          # Appointment history

routes/
└── web.php                        # All application routes
```

## 🚀 Laravel Installation Required

**Important:** This project currently has a React/Vite structure. To use the Blade templates, you need to install Laravel.

### Option 1: Fresh Laravel Installation

```bash
# Install Laravel (requires PHP 8.1+ and Composer)
composer create-project laravel/laravel hospital-appointment-system
cd hospital-appointment-system

# Copy the Blade templates
cp -r /path/to/this/project/resources/views/* resources/views/
cp /path/to/this/project/routes/web.php routes/web.php

# Install dependencies
composer install
npm install

# Set up environment
cp .env.example .env
php artisan key:generate

# Serve the application
php artisan serve
```

### Option 2: Add Laravel to Current Project

```bash
# Navigate to project directory
cd /home/user/hospital-appointment-system

# This would require significant reconfiguration
# Recommended: Use Option 1 (Fresh Installation)
```

## 📋 Routes Structure

All routes are defined in `routes/web.php`:

### Home & Authentication
- `GET /` → `welcome` (Route name: `home`) - **Main landing page with role selection**
- `GET /login` → `auth.login` (Route name: `login`)

### Public Booking (No Auth Required)
- `GET /booking?step=1` → `public.booking` (Route name: `booking`) - **Single route for all 4 steps**
  - Step 1: `/booking?step=1` (default) - Select Doctor
  - Step 2: `/booking?step=2` - Select Date & Time
  - Step 3: `/booking?step=3` - Patient Details
  - Step 4: `/booking?step=4` - Confirmation

### Admin Panel
- `GET /admin/dashboard` → `admin.dashboard` (Route name: `admin.dashboard`)
- `GET /admin/appointments` → `admin.appointments` (Route name: `admin.appointments`)
- `GET /admin/appointments/add` → `admin.add-appointment` (Route name: `admin.add-appointment`)
- `GET /admin/doctors` → `admin.doctors` (Route name: `admin.doctors`)
- `GET /admin/doctors/add` → `admin.doctor-add` (Route name: `admin.doctor-add`)
- `GET /admin/patients` → `admin.patients` (Route name: `admin.patients`)
- `GET /admin/calendar` → `admin.calendar` (Route name: `admin.calendar`)

### Doctor Portal
- `GET /doctor/dashboard` → `doctor.dashboard` (Route name: `doctor.dashboard`)
- `GET /doctor/appointments` → `doctor.appointments` (Route name: `doctor.appointments`)
- `GET /doctor/appointments/{id}` → `doctor.appointment-details` (Route name: `doctor.appointment-details`)
- `GET /doctor/calendar` → `doctor.calendar` (Route name: `doctor.calendar`)

### Front Desk
- `GET /frontdesk/dashboard` → `frontdesk.dashboard` (Route name: `frontdesk.dashboard`)
- `GET /frontdesk/add-appointment` → `frontdesk.add-appointment` (Route name: `frontdesk.add-appointment`)
- `GET /frontdesk/doctor-schedule` → `frontdesk.doctor-schedule` (Route name: `frontdesk.doctor-schedule`)
- `GET /frontdesk/patients` → `frontdesk.patients` (Route name: `frontdesk.patients`)
- `GET /frontdesk/history` → `frontdesk.history` (Route name: `frontdesk.history`)

## 🎨 Layout System

Each role has its own master layout with:
- **Sidebar navigation** (automatically highlights active page)
- **Header with user info** (role-specific avatar and details)
- **Content area** (yields from child views)
- **Tailwind CSS** via CDN (no build step required)

### Layout Features

#### Admin Layout (`layouts.admin`)
```blade
@extends('layouts.admin')

@section('title', 'Page Title')
@section('page-title', 'Dashboard')

@section('header-actions')
    <!-- Optional header buttons -->
@endsection

@section('content')
    <!-- Your page content -->
@endsection
```

#### Doctor Layout (`layouts.doctor`)
```blade
@extends('layouts.doctor')

@section('title', 'Page Title')
@section('page-title', 'My Appointments')

@section('header-back-button')
    <!-- Optional back button -->
@endsection

@section('header-actions')
    <!-- Optional header buttons -->
@endsection

@section('content')
    <!-- Your page content -->
@endsection
```

## 🔗 Navigation Links

All templates use Laravel route helpers:

```blade
{{ route('home') }}                                    # Home page
{{ route('login') }}                                    # Login
{{ route('booking') }}                                  # Booking (step 1)
{{ route('booking', ['step' => 2]) }}                   # Booking step 2
{{ route('admin.dashboard') }}                          # Admin dashboard
{{ route('doctor.appointments') }}                      # Doctor appointments
{{ route('frontdesk.add-appointment') }}                # Frontdesk add appointment
```

## 🎭 Active Navigation Highlighting

Layouts automatically highlight the active page using:

```blade
{{ request()->routeIs('admin.dashboard') ? 'text-white bg-sky-600' : 'text-gray-700 hover:bg-gray-100' }}
```

## 📦 What's Included

- ✅ **Home Page** with role selection (welcome.blade.php)
- ✅ **4 Master Layouts** (admin, doctor, frontdesk, public)
- ✅ **26 Blade Templates** (1 home + 1 login + 1 booking + 4 booking partials + 19 role-specific pages)
- ✅ **Single Booking Route** with multi-step wizard (?step=1,2,3,4)
- ✅ **All Routes Defined** in web.php (18 routes total)
- ✅ **Responsive Design** (Tailwind CSS)
- ✅ **Consistent Styling** (Sky-blue theme)
- ✅ **No Database Required** (Static templates only)
- ✅ **No Backend Logic** (Views only)

## ❌ What's NOT Included

- ❌ Laravel installation (you need to install it)
- ❌ Database migrations
- ❌ Controllers (all routes use closures)
- ❌ Models
- ❌ Authentication logic
- ❌ Form validation
- ❌ API endpoints
- ❌ Tests

## 🛠️ Next Steps for Full Implementation

1. **Install Laravel** (see installation options above)
2. **Set up authentication** (Laravel Breeze/Fortify/Jetstream)
3. **Create database migrations** for:
   - users (with roles)
   - doctors
   - patients
   - appointments
   - specialties
4. **Create Eloquent models** with relationships
5. **Create controllers** to replace route closures
6. **Add form validation** and CSRF protection
7. **Implement role-based middleware** (admin, doctor, frontdesk)
8. **Add backend logic** for CRUD operations
9. **Integrate with database** (replace static data)
10. **Add real-time features** (notifications, calendar sync)

## 📝 Testing the Templates (Once Laravel is Installed)

```bash
# Start Laravel development server
php artisan serve

# Visit in browser:
http://localhost:8000/                         # Home page (role selection)
http://localhost:8000/login                    # Login page
http://localhost:8000/booking                  # Public booking (step 1)
http://localhost:8000/booking?step=2           # Booking step 2
http://localhost:8000/booking?step=3           # Booking step 3
http://localhost:8000/booking?step=4           # Booking step 4
http://localhost:8000/admin/dashboard          # Admin panel
http://localhost:8000/doctor/dashboard         # Doctor portal
http://localhost:8000/frontdesk/dashboard      # Front desk
```

## 🎨 Design System

- **Primary Color**: Sky Blue (#0ea5e9)
- **Font**: Inter (Google Fonts)
- **Framework**: Tailwind CSS (via CDN)
- **Icons**: Inline SVG (Heroicons style)
- **Avatars**: UI Avatars API

## 📄 Original HTML Mockups

The original HTML mockups are preserved in:
```
public/mockups/
├── login.html
├── public-booking.html
├── public-booking-step2.html
├── public-booking-step3.html
├── public-booking-step4.html
├── admin-dashboard.html
├── admin-appointments.html
├── admin-add-appointment.html
├── admin-doctors.html
├── admin-doctor-add.html
├── admin-patients.html
├── admin-calendar.html
├── doctor-dashboard.html
├── doctor-appointments.html
├── doctor-calendar.html
├── doctor-appointment-details.html
├── frontdesk-dashboard.html
├── frontdesk-add-appointment.html
├── frontdesk-doctor-schedule.html
├── frontdesk-patients.html
└── frontdesk-history.html
```

## 🤝 Support

For issues or questions about the Blade templates:
1. Check this documentation
2. Review the original HTML mockups
3. Compare routes in `web.php` with template links

---

**Status**: Frontend Blade templates ready ✅ | Backend/Database not implemented ❌
