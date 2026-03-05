<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {

    $judul   = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);
    $tahun   = (int) $_POST['tahun'];
    $status  = (int) $_POST['status'];

    // Validasi
    if (empty($judul) || empty($penulis) || empty($tahun) || !isset($_POST['status'])) {

        echo "<h3 style='color:red;'>Error: Semua kolom wajib diisi!</h3>";
        echo "<a href='tambah_data.php'>Kembali ke Form</a>";
        exit;
    }

    if ($tahun < 2000) {
        echo "<h3 style='color:red;'>Error: Tahun minimal 2000!</h3>";
        echo "<a href='tambah_data.php'>Kembali ke Form</a>";
        exit;
    }

    // Prepared Statement
    $query = "INSERT INTO buku (judul_buku, penulis, tahun_terbit, status_pinjam) VALUES (?, ?, ?, ?)";
    $stmt  = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param($stmt, "ssii", $judul, $penulis, $tahun, $status);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);

} else {
    echo "<h3>Akses tidak valid!</h3>";
}
?>