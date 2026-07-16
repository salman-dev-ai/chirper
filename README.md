# 🐦 Chirper - Micro-blogging Platform

<div dir="rtl">

---

## مرحباً بك في Chirper 👋

**Chirper** هو تطبيق ويب للتدوين المصغر (Micro-blogging) يتيح للمستخدمين نشر التغريدات القصيرة والتواصل مع الآخرين. تم بناء التطبيق بإستخدام إطار العمل Laravel 12 مع واجهة مستخدم جميلة ومتجاوبة.

> **Developed by:** Eng. **Salman Al-Ansi**

---

## Features


### 🇬🇧 English
- ✅ Complete authentication system (Register, Login, Logout) with high security
- ✅ Post short messages (Chirps) with a 255-character limit
- ✅ Edit and delete chirps - owner-only access
- ✅ Display chirps sorted by latest with pagination
- ✅ Modern UI built with **DaisyUI 5** and **Tailwind CSS**
- ✅ Fully responsive design for all devices
- ✅ Interactive success and error messages
- ✅ CSRF & XSS attack protection
- ✅ Authorization policy to verify chirp ownership before edit/delete

---


## 🛠️ Technology Stack

- ![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel&logoColor=white)
  **Laravel 12** — Backend Framework

- ![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php&logoColor=white)
  **PHP 8.2+** — Server-side Programming Language

- ![SQLite](https://img.shields.io/badge/SQLite-003B57?style=flat&logo=sqlite&logoColor=white)
  **SQLite** — Database

- ![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white)
  **Tailwind CSS** — Utility-First CSS Framework

- ![DaisyUI](https://img.shields.io/badge/DaisyUI-5A0EF8?style=flat&logo=daisyui&logoColor=white)
  **DaisyUI 5** — UI Component Library

- ![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat&logo=vite&logoColor=white)
  **Vite** — Frontend Build Tool

---

## 🚀 طريقة التشغيل المحلي | Local Installation

### 📦 المتطلبات الأساسية | Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite (مثبت مسبقاً مع PHP)

### ⚙️ خطوات التثبيت | Installation Steps

<div dir="ltr">

```bash
# 1. استنساخ المشروع | Clone the repository
git clone https://github.com/salman-dev-ai/chirper.git
cd chirper

# 2. تثبيت حزم PHP | Install PHP dependencies
composer install

# 3. إعداد ملف البيئة | Set up environment file
copy .env.example .env
# OR: cp .env.example .env (for Linux/Mac)

# 4. توليد مفتاح التطبيق | Generate application key
php artisan key:generate

# 5. إنشاء قاعدة البيانات | Create SQLite database
php artisan migrate

# 6. تثبيت حزم الواجهة الأمامية | Install frontend dependencies
npm install

# 7. بناء الأصول الأمامية | Build frontend assets
npm run build

# 8. تشغيل الخادم المحلي | Run the development servers
php artisan serve
```

</div>

ثم في نافذة طرفية أخرى | Then in another terminal window:

<div dir="ltr">

```bash
npm run dev
```

</div>

### 🌐 فتح التطبيق | Access the Application
افتح المتصفح على الرابط التالي | Open your browser at:
**http://localhost:8000**

---

## 📸 لقطات الشاشة | Screenshots

<p align="center">
  <img src="https://via.placeholder.com/600x400?text=Chirper+Screenshot" alt="Chirper Screenshot" width="600"/>
  <br>
  <em>الصفحة الرئيسية | Home Page</em>
</p>


---

## 🗂 هيكل المشروع | Project Structure

<div dir="ltr">

```
chirper/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── Login.php        # التحكم في تسجيل الدخول
│   │   │   │   ├── Logout.php       # التحكم في تسجيل الخروج
│   │   │   │   └── Register.php     # التحكم في التسجيل
│   │   │   └── ChirpController.php  # التحكم في التغريدات
│   │   └── ...
│   ├── Models/
│   │   ├── User.php                 # نموذج المستخدم
│   │   └── Chirp.php                # نموذج التغريدة
│   └── Policies/
│       └── ChirpPolicy.php          # صلاحيات التغريدات
├── database/
│   └── migrations/
│       └── 2026_07_02_101301_create_chirps_table.php
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php      # واجهة تسجيل الدخول
│       │   └── register.blade.php   # واجهة التسجيل
│       ├── chirps/
│       │   └── edit.blade.php       # واجهة تعديل التغريدة
│       ├── components/
│       │   ├── chirp.blade.php      # مكون عرض التغريدة
│       │   └── layout.blade.php     # التخطيط العام
│       └── home.blade.php           # الصفحة الرئيسية
├── routes/
│   └── web.php                      # مسارات التطبيق
└── public/
    └── image/                       # صور المستخدمين
```

</div>

---

## 🔐 الأمان | Security

- ✅ **CSRF Protection** - جميع النماذج محمية برمز CSRF
- ✅ **XSS Protection** - استخدام Blade escaping `{{ }}` لمنع هجمات XSS
- ✅ **Authorization Policies** - صلاحيات للتأكد من ملكية التغريدة
- ✅ **Session Regeneration** - تجديد الجلسة بعد تسجيل الدخول وتسجيل الخروج
- ✅ **Password Hashing** - تشفير كلمات المرور بإستخدام Bcrypt

---

## 🤝 المساهمة | Contributing

نرحب بمساهماتكم! إذا كنت ترغب في المساهمة في تطوير Chirper:

1. Fork المشروع
2. أنشئ فرعاً جديداً (`git checkout -b feature/AmazingFeature`)
3. أضف تغييراتك (`git commit -m 'Add some AmazingFeature'`)
4. ادفع التغييرات (`git push origin feature/AmazingFeature`)
5. افتح Pull Request

---

## 📄 الترخيص | License

هذا المشروع مرخص تحت رخصة **MIT License**.

---

## 📞 التواصل | Contact

- * Eng. Salman Al-Ansi
- **GitHub:** [@salman-dev-ai](https://github.com/salman-dev-ai)
- **البريد الإلكتروني:
- ** (salman.developer.ai@gmali.com)

---

<p align="center">
  <strong>شكراً لاستخدام Chirper! 🐦💙</strong><br>
  <em>تم التطوير بواسطة المهندس سلمان الانسي - جميع الحقوق محفوظة © 2026</em>
</p>

</div>
