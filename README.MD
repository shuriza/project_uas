# Nama Proyek

Proyek ini adalah sebuah aplikasi web yang menyediakan layanan informasi dan pemesanan paket internet khusus untuk pelanggan bisnis melalui platform  **Indibizz** . Aplikasi ini dirancang untuk mempermudah pengguna dalam mencari, membandingkan, dan memilih paket internet yang sesuai dengan kebutuhan bisnis mereka.

## Table of Contents

1. [Fitur](#fitur)
2. [Persyaratan Sistem](#persyaratan-sistem)
3. [Instalasi](#instalasi)
4. [Penggunaan](#penggunaan)
5. [Kontribusi](#kontribusi)
6. [Lisensi](#lisensi)

## Fitur

* [X] Daftar paket internet lengkap dengan detail kecepatan, harga, dan fitur tambahan
* [X] Formulir pemesanan online
* [X] Status Pemesanan
* [X] Profil
* [X] Laporan Daftar Transaksi
* [X] Login
* [X] dashboard admin
* [X] hakakses superadmin
* [ ] Payment Gateway mengguanakan Midtrans

## Persyaratan Sistem

* PHP >= 8.0
* Laravel >= 10.x
* MySQL >= 5.7
* Composer
* npm
* node.js
* chart.js

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek di lokal Anda:

1. **Clone Repository**
   Clone repository ke direktori lokal Anda:

   ```
   git clone https://github.com/shuriza/project_uas.git
   ```
2. **Masuk ke Direktori Proyek**
   Pindah ke folder proyek hasil clone:

   ```
   cd project_uas

   ```
3. **Instal Dependensi dengan Composer**
   Instal semua dependensi Laravel yang dibutuhkan:

   ```
   composer install atau kalau sudah ada composer update

   ```
4. Install JavaScript dependencies:

   ```
   npm install && npm run dev
   ```
5. **Konfigurasi File `.env`**
   Salin file `.env.example` dan ubah namanya menjadi `.env`. Lakukan konfigurasi database sesuai kebutuhan:

   ```
   cp .env.example .env
   ```
6. **Generate Application Key**
   Jalankan perintah berikut untuk membuat application key Laravel:

   ```
   php artisan key:generate
   ```
7. **Migrasi Database**
   Buat tabel di database dengan menjalankan migrasi:

   ```
   php artisan migrate

   ```
8. **Jalankan Server Lokal**
   Mulai aplikasi Anda dengan perintah:

   ```
   php artisan serve

   ```
   Akses aplikasi melalui browser di:
