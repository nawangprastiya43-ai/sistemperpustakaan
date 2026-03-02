<?php

$buku = [
    ["judul" => "Laskar Pelangi", "penulis" => "Andrea Hirata", "tahun" => 2005, "status" => true],
    ["judul" => "Bumi", "penulis" => "Tere Liye", "tahun" => 2014, "status" => false],
    ["judul" => "Negeri 5 Menara", "penulis" => "Ahmad Fuadi", "tahun" => 2009, "status" => true],
    ["judul" => "Dilan 1990", "penulis" => "Pidi Baiq", "tahun" => 2014, "status" => false],
    ["judul" => "Atomic Habits", "penulis" => "James Clear", "tahun" => 2018, "status" => true]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>

<h2>Data Buku Perpustakaan</h2>

<?php foreach ($buku as $b) : ?>

    <p>
        <strong>Judul:</strong> <?= $b["judul"]; ?> <br>
        <strong>Penulis:</strong> <?= $b["penulis"]; ?> <br>
        <strong>Tahun:</strong> <?= $b["tahun"]; ?> <br>

        <?php
        // Label Buku Lama / Baru
        if ($b["tahun"] < 2015) {
            echo "<b>Buku Lama</b><br>";
        } else {
            echo "<b>Buku Baru</b><br>";
        }

        // Status Pinjam
        if ($b["status"] == true) {
            echo "<span style='color:red;'>Sedang Dipinjam</span>";
        } else {
            echo "<span style='color:green;'>Tersedia</span>";
        }
        ?>
    </p>
    <hr>

<?php endforeach; ?>

</body>
</html>