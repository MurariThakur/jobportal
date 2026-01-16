<div align="center">

# 🚀 CareerVibe - Job Portal Platform

### Your Gateway to Dream Careers

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)

<p align="center">
  <img src="https://img.shields.io/badge/Status-Active-success?style=flat-square" alt="Status">
  <img src="https://img.shields.io/badge/Maintained-Yes-success?style=flat-square" alt="Maintained">
  <img src="https://img.shields.io/badge/PRs-Welcome-brightgreen?style=flat-square" alt="PRs Welcome">
</p>

[Features](#-features) • [Tech Stack](#-tech-stack) • [Installation](#-installation) • [Usage](#-usage) 

</div>

---

## 📋 About The Project

**CareerVibe** is a comprehensive job portal platform built with Laravel that connects job seekers with employers. The platform offers a seamless experience for posting jobs, applying to positions, and managing recruitment processes with an intuitive admin panel.

### 🎯 Why CareerVibe?

- ✨ **Modern UI/UX** - Clean and responsive design
- 🔐 **Secure Authentication** - Role-based access control
- 📊 **Admin Dashboard** - Comprehensive management system
- 🎨 **User Profiles** - Customizable user profiles with image upload
- 🔍 **Advanced Search** - Filter jobs by category, type, location, and experience
- 💼 **Job Management** - Easy job posting and application tracking

---

## ✨ Features

### 👥 For Job Seekers
- 🔐 User registration and authentication
- 📝 Create and manage professional profile
- 🔍 Advanced job search with multiple filters
- 💼 Apply to jobs with one click
- ⭐ Save favorite jobs for later
- 📊 Track application status
- 🖼️ Upload profile picture

### 🏢 For Employers
- 📢 Post unlimited job listings
- ✏️ Edit and manage posted jobs
- 👀 View job applicants
- 📈 Track application statistics
- 🎯 Feature jobs for better visibility
- 📧 Receive application notifications

### 👨💼 Admin Panel
- 📊 Comprehensive dashboard with statistics
- 👥 User management (assign roles)
- 📁 Category management
- 🏷️ Job type management
- 💼 Job listings management
- 🔒 Secure admin authentication

---

## 🛠️ Tech Stack

<div align="center">

### Backend
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

### Frontend
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)

### Tools & Libraries
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![NPM](https://img.shields.io/badge/NPM-CB3837?style=for-the-badge&logo=npm&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)

</div>

### Key Technologies

| Technology | Purpose |
|------------|----------|
| **Laravel 10.x** | PHP Framework for backend |
| **MySQL** | Database management |
| **Bootstrap 5** | Responsive UI framework |
| **jQuery** | DOM manipulation & AJAX |
| **Trumbowyg** | WYSIWYG editor for job descriptions |
| **Laravel Sanctum** | API authentication |
| **Laravel Debugbar** | Development debugging |

---

## 📦 Installation

### Prerequisites

Before you begin, ensure you have the following installed:

- ![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat-square&logo=php) PHP >= 8.1
- ![Composer](https://img.shields.io/badge/Composer-Latest-885630?style=flat-square&logo=composer) Composer
- ![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql) MySQL >= 8.0
- ![Node.js](https://img.shields.io/badge/Node.js-16+-339933?style=flat-square&logo=node.js) Node.js & NPM (optional)

### 🚀 Quick Start

#### Step 1: Clone the Repository

```bash
git clone https://github.com/yourusername/jobportal.git
cd jobportal
```

#### Step 2: Install Dependencies

```bash
composer install
```

#### Step 3: Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### Step 4: Configure Database

Edit `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### Step 5: Run Migrations & Seeders

```bash
# Run migrations and seed database with sample data
php artisan migrate:fresh --seed
```

#### Step 6: Create Storage Link (Optional)

```bash
php artisan storage:link
```

#### Step 7: Start Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 🔑 Default Login Credentials

### Admin Access
```
URL: http://localhost:8000/admin/login
Email: admin@example.com
Password: password
```

### User Accounts
```
User 1: john@example.com / password
User 2: jane@example.com / password
User 3: mike@example.com / password
```

---

## 📖 Usage

### For Job Seekers

1. **Register/Login** - Create an account or login
2. **Complete Profile** - Add your details and upload profile picture
3. **Search Jobs** - Use filters to find relevant positions
4. **Apply** - Submit applications with one click
5. **Track** - Monitor your applications in "Jobs Applied"

### For Employers

1. **Login** - Access your account
2. **Post Job** - Click "Post a Job" and fill details
3. **Manage** - Edit or delete your job listings
4. **Review** - Check applicants for your jobs

### For Admins

1. **Access Admin Panel** - Login at `/admin/login`
2. **Dashboard** - View statistics and insights
3. **Manage Users** - Assign roles (admin/user)
4. **Manage Content** - Categories, job types, and listings

---

## 📁 Project Structure

```
jobportal/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── admin/          # Admin controllers
│   │   │   └── Frontend/       # Frontend controllers
│   │   └── Middleware/         # Custom middleware
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/                # Database seeders
├── public/
│   ├── assets/                 # Frontend assets
│   ├── admin/                  # Admin panel assets
│   └── uploads/                # User uploads
├── resources/
│   └── views/
│       ├── admin/              # Admin views
│       └── frontend/           # Frontend views
└── routes/
    └── web.php                 # Application routes
---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Bootstrap](https://getbootstrap.com) - UI Framework
- [Font Awesome](https://fontawesome.com) - Icons
- [Trumbowyg](https://alex-d.github.io/Trumbowyg/) - WYSIWYG Editor

---

<div align="center">

### ⭐ Star this repository if you find it helpful!

**Made with ❤️ by Murari**

[Back to Top](#-careervibe---job-portal-platform)

</div>
