# SPK-AHP
Aplikasi sederhana sistem pendukung keputusan metode SAW pembobotan menggunakan PHP

# Fitur Aplikasi
1. Halamat Login untuk masuk sebagai admin atau pengguna.
2. Halaman Admin untuk melakukan CRUD pada Database
3. Halaman Pengguna untuk proses SPK

# Petunjuk Penggunaan
Aplikasi ini dibuat menggunakan bahasa PHP, jadi Tools/ Software yang digunakan adalah:
1. Text editor, seperti notepad, notepad++, Visual studio Code untuk mengedit Code
2. Xampp, sebagai local host server

Langkah penggunaan
1. Pastikan file berada di folder htdocs di xampp
2. Nyalakan Apache dan mysql di xampp
3. Import Database sql di localhost/phpmyadmin
4. Buka halaman di localhost/(nama folder project ini)
5. Login terlebih dahulu menggunakan NIM dan Password untuk mengarahkan pengguna untuk login sebagai admin atau mahasiswa(user)
6. Untuk halaman Admin, ada 4 menu utama,
   1. 3 menu diantaranya (User, Mata Kuliah, Bobot) digunakan untuk melakukan CRUD dan view detail)
   2. 1 Menu untuk melihat laporan hasil SPK masing masing-masing pengguna.
7. Untuk halaman Mahasiswa (pengguna), ada 3 menu utama
   1. Menu Nilai, untuk melakukan input nilai
   2. Menu Pembobotan, untuk melihat teori SPK dan ringkasan proses SPK nya
   3. Menu Hasil, untuk melihat hasil SPK
8. Logout untuk keluar dari aplikasi

# Demo
1. login admin,    nim: 00000, pass: admin
2. login pengguna, nim: 11111, pass: budi
Atau anda bisa melihat di databasenya langsung di phpmyadmin (password tidak menggunakan enkripsi)

# Versi Aplikasi
Aplikasi ini dulu dibuat dengan versi xammp / PHP / mysql yang lama (masih menggunakan syntax mysql bukan mysqli).
Versi ini di repository ini merupakan versi update menggunakan aturan-aturan baru.
Jika masih ada kesalahan, silahkan kirimkan Issue.

# ISSUE
Aplikasi ini adalah aplikasi pertama saya yang saya upload di github, sambil mencoba meraba-raba berbagai fitur di github. Untuk itu saya menggunakan project lama saya yang pastinya banyak kekurangan dan masalah. Untuk itu silahkan kirimkan issue, komentar, ataupun kontribusi agar saya bisa lebih paham dalam penggunaan github.

# LICENSE
Aplikasi ini menggunakan <a href="https://github.com/mhihanif/spksederhana/blob/main/LICENSE">lisensi MIT</a>

# Code of Conduct
Aplikasi menggunakan contributur convenant pada file <a href="https://github.com/mhihanif/spksederhana/blob/main/CODE_OF_CONDUCT.md">CODE_OF_CONDUCT.md</a>

# CONTRIBUTING
Untuk Detail kontribusi bisa dilihat pada <a href="https://github.com/mhihanif/spksederhana/blob/main/CONTRIBUTING.md">CONTRIBUTING.md</a>

# Author
* **MUHAMMAD HANIF INDRA**
