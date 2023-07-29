## Tugas Kelompok ke-4 (Week 9)

Kami dari kelompok 7 membuat sebuah aplikasi transasksi produk sederhana yang memiliki fungsi authentication dan manipulasi data untuk tugas mata kuliah Introduction to Data and Information Management. Berikut daftar anggota kelompok kami.

- Fathan Ikram Farija (2602291595)
- Irfan Zafar (2602291014)
- Setyo Dwi Purnomo (2602292124)
- Shidqi Barezi (2602289685)

## Cara menjalankan program

1. Clone atau download repository ini
2. Buatlah sebuah database dengan nama yang dapat disesuaikan dengan variable yang ada di dalam file config/config.php
3. Dalam database tersebut, buatlah 3 tabel sebagai berikut:
   - Tabel users
     - id (int, AI)
     - nama_lengkap (varchar)
     - email (varchar)
     - password (varchar)
   - Tabel product
     - id (int, AI)
     - nama_barang (varchar)
     - harga (int)
     - satuan (varchar)
     - keterangan (text)
     - user_id (int)
   - Tabel transactions
     - id (int, AI)
     - produk (varchar)
     - kuantitas (varchar)
     - total (varchar)
     - user_id (int)
