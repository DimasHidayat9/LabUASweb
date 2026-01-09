## UAS Pemograman Web-1

# Showroom Management System
Proyek ini bermula dari kebutuhan akan sebuah platform digital yang mampu menyajikan katalog kendaraan secara eksklusif sekaligus memberikan alat kontrol penuh bagi pengelola showroom. Tujuan utamanya adalah menciptakan sebuah sistem informasi manajemen inventaris yang ringan namun tangguh, yang mampu menangani data secara dinamis mulai dari pencarian unit hingga pengelolaan foto kendaraan secara otomatis.

Arsitektur dan Teknologi Sistem ini dibangun menggunakan arsitektur Model-View-Controller (MVC) sederhana. Struktur ini memisahkan logika data (Model), antarmuka pengguna (View), dan pengatur alur kerja (Controller) sehingga kode program menjadi lebih terorganisir.

- Di sisi Model, kita memiliki fungsi-fungsi cerdas seperti getAllKendaraan dan getById yang bertugas berinteraksi dengan database MySQL.

- Di sisi View, kita menggunakan Bootstrap 5 untuk memastikan tampilan tetap elegan dan responsif, baik saat dibuka melalui komputer maupun perangkat seluler.

Alur Kerja Pengguna dan Keamanan Pengalaman pengguna dimulai dari gerbang Login yang aman, di mana sistem akan memvalidasi identitas pengguna berdasarkan tabel users. Keamanan menjadi prioritas utama dengan diterapkannya sistem Role-Based Access Control.

- Pengguna Umum hanya diberikan akses ke halaman Katalog untuk mencari dan melihat detail kendaraan.<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/a4ba0498-7c60-4671-8405-1c3f12a0837f" />


- Admin diberikan hak istimewa untuk mengakses Dashboard Admin, di mana tombol-tombol manajemen seperti "Tambah Unit" dan "Hapus" dimunculkan secara khusus.<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/2923147a-d5c6-41b6-b044-e449ec2023ad" />


Inovasi Manajemen Gambar Salah satu fitur unggulan yang kita kembangkan adalah Sistem Unggah Gambar Dinamis. Alih-alih hanya menggunakan teks, setiap unit kendaraan kini dapat memiliki foto asli yang diunggah melalui dashboard admin. Sistem secara otomatis mengganti nama file agar unik, menyimpannya ke folder fisik assets/img/, dan mencatat lokasinya di database sehingga katalog tampil dengan visual yang mewah dan informatif.

## Kesimpulan
Secara keseluruhan, project Showroom sederhana  ini bukan sekadar aplikasi CRUD (Create, Read, Update, Delete) biasa, melainkan sebuah solusi manajemen terpadu yang menggabungkan estetika tampilan dengan fungsionalitas teknis yang solid. Sistem ini siap memberikan kemudahan bagi Yang Mulia dalam memantau stok serta memberikan layanan informasi terbaik bagi calon pelanggan.

# Link Dokumentasi YouTube:

