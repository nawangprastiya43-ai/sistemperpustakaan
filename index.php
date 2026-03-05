<?php
require 'koneksi.php';

$keyword = "";

// Ambil keyword
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['keyword']);
}

// Query dengan pencarian
if ($keyword != "") {
    $query = "SELECT * FROM buku 
              WHERE judul LIKE '%$keyword%' 
              OR penulis LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM buku";
}

$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>

<h2>Data Buku</h2>

<form method="GET" action="">
    <input 
        type="text" 
        name="keyword" 
        placeholder="Ketik kata kunci..."
        value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>"
    >
    <button type="submit">Cari</button>
    <a href="index.php">Reset</a>
</form>

<br>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Tahun</th>
    <th>Status</th>
</tr>

<?php if (mysqli_num_rows($result) > 0) : ?>

    <?php while ($b = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= htmlspecialchars($b['judul_buku']); ?></td>
        <td><?= htmlspecialchars($b['penulis']); ?></td>
        <td><?= htmlspecialchars($b['tahun_terbit']); ?></td>
        <td>

        <?php
        if ($b["tahun_terbit"] > 2026 ) {
            echo "<span style='color:orange; font-weight:bold;'>Coming Soon</span>";
        }
        elseif ($b["status_pinjam"] == 1) {
            echo "<span style='color:red;'>Sedang Dipinjam</span>";
        }
        else {
            echo "<span style='color:green;'>Tersedia</span>";
        }
        ?>

        </td>
    </tr>
    <?php endwhile; ?>

<?php else : ?>
    <tr>
        <td colspan="4" style="text-align:center; color:red;">
            Data tidak ditemukan
        </td>
    </tr>
<?php endif; ?>

</table>

</body>
</html>