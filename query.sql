<-- membuat database -->
CREATE DATABASE db_perpus;
<--masuk ke database  -->
USE db_perpus;
<--buat tabel-->
CREATE TABLE buku (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     judul_buku VARCHAR(100),
    ->     penulis VARCHAR(100),
    ->     tahun_terbit INT,
    ->     status_pinjam BOOLEAN
    -> );
< -- masukkan data ke table-->
INSERT INTO buku (judul_buku, penulis, tahun_terbit, status_pinjam) VALUES
    -> ('Laskar Pelangi', 'Andrea Hirata', 2005, true),
    -> ('Bumi', 'Tere Liye', 2014, false),
    -> ('Negeri 5 Menara', 'Ahmad Fuadi', 2009, true),
    -> ('Dilan 1990', 'Pidi Baiq', 2014, false),
    -> ('Atomic Habits', 'James Clear', 2018 true);
<-- tampilkan data -->
SELECT * FROM buku;