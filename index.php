<?php

$buku = [
    ["judul" => "Laskar Pelangi", "penulis" => "Andrea Hirata", "tahun" => 2005, "status" => true],
    ["judul" => "Bumi", "penulis" => "Tere Liye", "tahun" => 2014, "status" => false],
    ["judul" => "Negeri 5 Menara", "penulis" => "Ahmad Fuadi", "tahun" => 2009, "status" => true],
    ["judul" => "Dilan 1990", "penulis" => "Pidi Baiq", "tahun" => 2014, "status" => false],
    ["judul" => "Atomic Habits", "penulis" => "James Clear", "tahun" => 2018, "status" => true],
    ["judul" => "qqqqq", "penulis" => "nawang", "tahun"=> 2027, "status" => false],
];

$keyword = "";

if (isset($_GET['keyword'])) {
    $keyword = strtolower($_GET['keyword']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>

<h2>Data Buku</h2>

<form method="GET">
    <input type="text" name="keyword" placeholder="Cari Buku...">
    <button type="submit">Cari</button>
    <a href="index.php" style="margin-left:10px;">Reset Pencarian</a>
</form>

<br>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Tahun</th>
    <th>Status</th>
</tr>

<?php $dataDitemukan = false; ?>

<?php foreach ($buku as $b) : ?>

<?php
if ($keyword == "" ||
    str_contains(strtolower($b['judul']), $keyword) ||
    str_contains(strtolower($b['penulis']), $keyword)
) :

    $dataDitemukan = true;
?>

<tr>
    <td><?= $b['judul']; ?></td>
    <td><?= $b['penulis']; ?></td>
    <td><?= $b['tahun']; ?></td>
    <td>

       <?php
    if ($b["tahun"] > 2026) {
        echo "<span style='color:orange; font-weight:bold;'>Coming Soon</span>";
    }
    else if ($b["status"] == true) {
        echo "<span style='color:red;'>Sedang Dipinjam</span>";
    }
    else {
        echo "<span style='color:green;'>Tersedia</span>";
    }
    ?>
    </td>
</tr>

    <?php endif; ?>

<?php endforeach; ?>
    <?php if (!$dataDitemukan) : ?>
    <tr>
        <td colspan="4" style="text-align:center; color:red;">
            Data tidak ditemukan
        </td>
    </tr>
    <?php endif; ?>

</table>

</body>
</html>