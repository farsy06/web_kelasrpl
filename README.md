# Web Kelas RPL

Web Kelas RPL adalah website yang dibuat untuk memudahkan siswa untuk mengelola karya-karyanya.

## Deskripsi

Aplikasi web untuk kelas RPL menggunakan Laravel 12 dengan fitur-fitur lengkap untuk manajemen karya siswa, event, dan profil pengguna.

## Fitur Utama

- **Autentikasi**
  - Login
  - Register
  - Manajemen profil

- **Dashboard Admin**
  - Ringkasan aktivitas
  - Manajemen siswa
  - Manajemen event
  - Statistik pengguna

- **Manajemen Karya**
  - Unggah dan kelola karya
  - Kategori karya
  - Komentar dan tanggapan

- **Profil Siswa**
  - Edit profil
  - Upload foto profil
  - Manajemen sosial media
  - Bio

- **Event**
  - Kalender event
  - Pendaftaran online
  - Detail event
  - Pengingat jadwal

- **Responsive Design**
  - Desktop
  - Tablet
  - Mobile

## Teknologi yang Digunakan

- **Backend**
  - [Laravel 12](https://laravel.com/)
  - [PHP 8.2+](https://www.php.net/)
  - [Composer](https://getcomposer.org/)
  - [MariaDB](https://mariadb.org/)

- **Frontend**
  - [Tailwind CSS 3.4.17](https://tailwindcss.com/)
  - [Node.js 22.x](https://nodejs.org/)
  - [npm](https://www.npmjs.com/)
  - ~~Vite 6.3.5~~ (tidak digunakan)

- **Development Tools**
  - [Git](https://git-scm.com/)
  - [XAMPP](https://www.apachefriends.org/)
  - [VS Code](https://code.visualstudio.com/)

## Persyaratan Sistem

- Web Server (Apache/Nginx)
- PHP 8.2 atau lebih tinggi
- MariaDB 10.4 atau lebih tinggi
- Ekstensi PHP yang dibutuhkan:
  - BCMath
  - Ctype
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PDO
  - Tokenizer
  - XML

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
