# ♻️ EcoSmart – Aplikasi Edukasi Pengelolaan Sampah Berbasis Web

**EcoSmart** adalah platform edukatif berbasis web yang bertujuan untuk meningkatkan kesadaran pengelolaan sampah sejak usia dini. Dibangun menggunakan **Laravel (PHP Framework)**, website ini menyediakan fitur klasifikasi sampah berbasis Machine Learning, informasi edukatif, dan tampilan interaktif untuk mempermudah pemahaman anak-anak dan pelajar.

## 🌐 Fitur Utama

- 🔐 **Login & Registrasi**  
  Autentikasi pengguna dengan sistem keamanan Laravel Auth.

- 📸 **Kamera / Upload Gambar**  
  Fitur identifikasi sampah menggunakan gambar dengan bantuan model Machine Learning (terintegrasi via API atau TensorFlow.js).

- 📚 **Informasi Edukasi Pengelolaan Sampah**  
  Konten edukatif tentang cara memilah dan mengelola berbagai jenis sampah.

- 🧾 **Riwayat Klasifikasi**  
  Menyimpan dan menampilkan riwayat klasifikasi yang telah dilakukan user.

## 🛠️ Teknologi yang Digunakan

- **Laravel 10** – Framework backend PHP
- **MySQL** – Database manajemen data pengguna & riwayat
- **Bootstrap 5** – Desain UI responsif
- **TensorFlow.js / Flask API** – Untuk klasifikasi sampah menggunakan gambar
- **Garbage Classification Dataset v2** – Dataset klasifikasi gambar

## 🧠 Alur Sistem

1. Pengguna registrasi/login
2. Mengakses halaman upload/kamera untuk klasifikasi
3. Gambar dikirim ke model klasifikasi
4. Sistem membaca dan menampilkan informasi jenis sampah
5. Data disimpan ke database sebagai riwayat klasifikasi

## 🗃️ Dataset yang Digunakan

**Garbage Classification V2**  
Dataset open-source yang berisi gambar dari berbagai kategori sampah seperti:

- `cardboard`
- `glass`
- `metal`
- `paper`
- `plastic`
- `trash`

Dataset ini digunakan untuk melatih model klasifikasi gambar berbasis CNN.

## 👥 Anggota Kelompok
| Nama                     | NIM         |
|--------------------------|-------------|
| Fakhir Mustafa Afdal     | 21102228    |
| Nathanael Andra Wijaya   | 21102201    |
| Septya Andini Putri      | 21102177    |
| Ario Mukti Elsandy       | 2211102184  |
| Kyla Azzahra Kinan       | 2211102225  |
