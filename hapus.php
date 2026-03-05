<?php
require 'koneksi.php';

// cek apakah ada id di URL
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // query delete dengan prepared statement
    $query = "DELETE FROM buku WHERE id = ?";

    $stmt = mysqli_prepare($koneksi, $query);

    // bind parameter (i = integer)
    mysqli_stmt_bind_param($stmt, "i", $id);

    // eksekusi query
    mysqli_stmt_execute($stmt);

}

// kembali ke halaman utama
header("Location: index.php");
exit;
?>