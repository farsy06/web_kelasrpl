# Web Kelas RPL

Web Kelas RPL adalah website yang dibuat untuk memudahkan siswa untuk mengelola karya-karyanya.

## Deskripsi

Aplikasi web untuk kelas RPL menggunakan Laravel 12 dengan fitur:

- Manajemen profil siswa
- Sistem login/logout
- Dashboard admin
- Sistem event
- Sosial media integrasi
- Responsive design

## Fitur

- Login
- Register
- Dashboard
- Karya
- Komentar
- Sosial Media
- Profil

## Teknologi yang digunakan

- Laravel 12
- PHP 8.2.12
- Composer 2.8.8
- Node.js 22.15.1
- npm 11.3.0
- MariaDB 10.4.32
- Tailwind CSS 3.4.17 (via CDN)
- ~~Vite 6.3.5~~ (tidak digunakan)

## Persyaratan Sistem

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js 22.x atau lebih tinggi
- MariaDB 10.4 atau lebih tinggi
- Web Server (Apache/Nginx)
- Git

## Cara Menggunakan

### 1. Persiapan Sistem

1. Pastikan XAMPP sudah terinstall dengan:
   - Apache
   - MySQL
   - PHP 8.2

2. Pastikan port 80 dan 3306 tidak digunakan

3. Pastikan mod_rewrite Apache sudah aktif

### 2. Instalasi

1. Clone repository ini:

   ```bash
   git clone https://github.com/farsy06/web_kelasrpl.git
   cd web_kelasrpl
   ```

2. Install dependensi PHP:

   ```bash
   composer install
   ```

3. Install dependensi Node.js:

   ```bash
   npm install
   ```

4. Generate application key:

   ```bash
   php artisan key:generate
   ```

5. Konfigurasi database:
   - Buka file `.env` di root project
   - Sesuaikan konfigurasi database:

     ```properties
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=web_kelasrpl
     DB_USERNAME=root
     DB_PASSWORD=
     ```

6. Buat database baru di phpMyAdmin:
   - Nama database: `web_kelasrpl`
   - Karakter set: `utf8mb4`
   - Collation: `utf8mb4_unicode_ci`

7. Jalankan migrasi:

   ```bash
   php artisan migrate
   ```

8. Jalankan seeder:

   ```bash
   php artisan db:seed
   ```

9. Jalankan aplikasi:

   ```bash
   php artisan serve
   ```

10. Akses aplikasi di browser:
    - URL: `http://localhost:8000`

## Fitur Utama

- **Dashboard Admin**
  - Manajemen siswa
  - Manajemen event
  - Statistik

- **Profil Siswa**
  - Edit profil
  - Upload foto profil
  - Manajemen sosial media
  - Bio

- **Event**
  - Daftar event
  - Detail event
  - Pendaftaran

- **Responsive Design**
  - Desktop
  - Tablet
  - Mobile

## Struktur Direktori

```properties
web_kelasrpl/
├── app/
│   ├── Controllers/
│   ├── Models/
│   └── ...
├── resources/
│   ├── views/
│   └── ...
├── public/
│   ├── storage/
│   └── ...
└── ...
```

## License

[MIT License](https://opensource.org/licenses/MIT)

## Author

- [farsy06](https://github.com/farsy06) - Project Maintainer, Backend Developer
- [CodeMaster-D](https://github.com/CodeMaster-D) - Frontend Developer
- [FR156](https://github.com/FR156) - Frontend Developer

## Special Thanks

- [Laravel Framework](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [XAMPP](https://www.apachefriends.org/)
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [npm](https://www.npmjs.com/)
