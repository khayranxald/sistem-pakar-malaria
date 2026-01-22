# 🦟 Sistem Pakar Diagnosa Penyakit Malaria

Sistem Pakar Diagnosa Penyakit Malaria adalah aplikasi berbasis web yang bertujuan untuk membantu pengguna dalam **mendiagnosis kemungkinan penyakit malaria** berdasarkan gejala yang dialami.  
Sistem ini menerapkan metode **Forward Chaining (FC)** dan **Certainty Factor (CF)** untuk menghasilkan diagnosis beserta tingkat keyakinannya.

---

## 📌 Fitur Utama

- ✅ Diagnosa penyakit malaria berdasarkan gejala
- ✅ Menggunakan metode **Forward Chaining** untuk penarikan kesimpulan
- ✅ Menggunakan metode **Certainty Factor (CF)** untuk menghitung tingkat keyakinan
- ✅ Informasi detail penyakit malaria
- ✅ Tampilan web sederhana dan mudah digunakan
- ✅ Terhubung dengan database MySQL

---

## 🧠 Metode yang Digunakan

### 1. Forward Chaining
Forward Chaining adalah metode penalaran yang dimulai dari **fakta (gejala yang dipilih pengguna)** kemudian dicocokkan dengan aturan (rule) untuk mendapatkan kesimpulan berupa penyakit.

### 2. Certainty Factor (CF)
Certainty Factor digunakan untuk menghitung **tingkat kepastian diagnosis**, berdasarkan:
- Nilai keyakinan pakar
- Tingkat keyakinan pengguna terhadap gejala

Hasil akhir berupa **persentase keyakinan** terhadap penyakit malaria yang terdeteksi.

---

## 🛠️ Teknologi yang Digunakan

- **Bahasa Pemrograman**:  
  - PHP  
- **Database**:  
  - MySQL  
- **Frontend**:  
  - HTML  
  - CSS  
  - JavaScript  
- **Web Server**:  
  - Apache (XAMPP / Laragon)

---

## ⚙️ Cara Menjalankan Project

1. Clone repository ini
   ```bash
   git clone https://github.com/username/nama-repo.git
Pindahkan folder project ke:

htdocs (XAMPP) atau

www (Laragon)

Import database:

Buka phpMyAdmin

Buat database (misalnya: pakar_malaria)

Import file SQL dari folder database

Atur koneksi database pada file:

php
Copy code
database/koneksi.php
Jalankan server Apache & MySQL

Akses melalui browser:

arduino
Copy code
http://localhost/nama-folder-project
📊 Output Sistem
Jenis penyakit malaria yang terdeteksi

Persentase tingkat keyakinan diagnosis

Informasi penjelasan penyakit

⚠️ Catatan
Sistem ini bukan pengganti diagnosis dokter, melainkan sebagai alat bantu edukasi dan konsultasi awal.
