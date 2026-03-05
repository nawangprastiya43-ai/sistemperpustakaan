<?php
require 'koneksi.php';

// cek apakah form disubmit
if (isset($_POST['submit'])) {

    // tangkap data dari form
    $id = $_POST['id'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $status = $_POST['status_pinjam'];

    // query update menggunakan prepared statement
    $query = "UPDATE buku 
              SET judul_buku = ?, penulis = ?, tahun_terbit = ?, status_pinjam = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($koneksi, $query);

    // bind parameter
    mysqli_stmt_bind_param($stmt, "ssiii", $judul, $penulis, $tahun, $status, $id);

    // eksekusi query
    mysqli_stmt_execute($stmt);

}

// kembali ke halaman utama
header("Location: index.php");
exit;
?>