# Website Manajemen Kursus

Website ini adalah aplikasi manajemen kursus berbasis web yang dibangun menggunakan Laravel, Livewire, dan Tailwind CSS.

## 👩‍💻 Tentang Project
- **Nama:** Fina Julianti
- **NIM:** H1D023119
- **Kelas:** Pemrograman Web II B

## 🚀 Fitur Utama
- CRUD Kursus, Instruktur, Peserta, Pendaftaran, Materi
- Autentikasi (Login & Register)
- Validasi: Peserta tidak bisa daftar kursus yang sama dua kali
- Upload materi per kursus
- Tabel relasi (belongsTo, hasMany)
- Jumlah peserta per kursus
- Tampilan responsive dengan Tailwind CSS

## 🗂️ Struktur Database
- **Kursus:** id, nama_kursus, durasi, instruktur_id, biaya
- **Instruktur:** id, nama, email
- **Peserta:** id, nama, email
- **Pendaftaran:** id, kursus_id, peserta_id, status
- **Materi:** id, kursus_id, judul, deskripsi

## 🔗 Relasi
- Kursus → belongsTo Instruktur
- Pendaftaran → belongsTo Kursus & Peserta
- Materi → belongsTo Kursus

## 💡 Cara Menjalankan Project
1. Clone repository:
   ```
   git clone https://github.com/finadio/kursus_Laravel_H1D023119.git
   ```
2. Install dependencies:
   ```
   composer install
   npm install
   ```
3. Copy file .env:
   ```
   cp .env.example .env
   ```
4. Generate key:
   ```
   php artisan key:generate
   ```
5. Atur koneksi database di file `.env`
6. Jalankan migration:
   ```
   php artisan migrate
   ```
7. Jalankan server:
   ```
   php artisan serve
   ```
8. Buka di browser: [http://localhost:8000](http://localhost:8000)

## 📸 Screenshot
(Tambahkan screenshot halaman utama, CRUD, upload materi, dll)

## 📚 Lisensi
Project ini dibuat untuk keperluan pembelajaran.
