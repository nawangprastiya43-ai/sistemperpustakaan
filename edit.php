<?php
require 'koneksi.php';

// cek apakah ada id
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // query select menggunakan prepared statement
    $query = "SELECT * FROM buku WHERE id = ?";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $data = mysqli_fetch_assoc($result);

} else {

    echo "ID tidak ditemukan!";
    exit;

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Data Buku</title>
</head>
<body>

<h2>Edit Data Buku</h2>

<form method="POST" action="proses_edit.php">

    <!-- input tersembunyi untuk membawa ID -->
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <label>Judul Buku:</label><br>
    <input type="text" name="judul_buku" value="<?= htmlspecialchars($data['judul_buku']); ?>"><br><br>

    <label>Penulis:</label><br>
    <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']); ?>"><br><br>

    <label>Tahun Terbit:</label><br>
    <input type="number" name="tahun_terbit" value="<?= htmlspecialchars($data['tahun_terbit']); ?>"><br><br>

    <label>Status Pinjam:</label><br>
    <select name="status_pinjam">
        <option value="0" <?= $data['status_pinjam'] == 0 ? "selected" : ""; ?>>Tersedia</option>
        <option value="1" <?= $data['status_pinjam'] == 1 ? "selected" : ""; ?>>Sedang Dipinjam</option>
    </select>
    <br><br>

    <button type="submit" name="submit">Update Data</button>

</form>

</body>
</html>