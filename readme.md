# Sistem Login dan Registrasi dengan PHP & PDO

Proyek ini adalah contoh sederhana dari sistem login dan registrasi pengguna menggunakan PHP dan metode PDO. Database yang digunakan adalah MySQL dengan koneksi aman, serta fitur registrasi yang memeriksa apakah username dan email unik.

## Fitur

- Registrasi pengguna baru dengan username dan email unik.
- Login pengguna menggunakan username dan password.
- Penyimpanan password secara aman dengan `password_hash`.
- Halaman selamat datang setelah login.
- Sistem logout untuk mengakhiri sesi pengguna.

## Struktur Database

Buat database bernama `login_pdo` dan tabel `users` dengan perintah SQL berikut:

```sql
CREATE DATABASE login_pdo;

USE login_pdo;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

## File Project

- `config.php` : Konfigurasi koneksi database.
- `register.php` : Halaman registrasi pengguna.
- `login.php` : Halaman login pengguna.
- `welcome.php` : Halaman selamat datang setelah login berhasil.
- `logout.php` : Mengakhiri sesi pengguna.

## Cara menggunakan

1. Clone Repository ini :

```bash
  git clone https://github.com/adityamaulanazidqy/login-register-pdo
```

2. Buat database dan tabel sesuai dengan instruksi di atas.
3. Sesuaikan pengaturan koneksi database di `config.php`.
4. Buka `register.php` di browser untuk mendaftarkan akun baru.
5. Login melalui `login.php` setelah mendaftar.
6. Setelah login, Anda akan diarahkan ke `welcome.php`.

## Catatan

Untuk tampilan CSS, **kalian bisa menyesuaikan dengan keinginan masing-masing**. Saya cukup amatir dalam mengatur tampilan, jadi silakan kembangkan desainnya sesuai preferensi kalian! 🤧🔥
