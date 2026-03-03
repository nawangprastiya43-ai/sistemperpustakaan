<?php

if (isset($_POST['submit'])) {

    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun   = $_POST['tahun'];
    $status  = $_POST['status'];

    if (empty($judul) || empty($penulis) || empty($tahun) || empty($status)) {

        echo "<h3 style='color:red;'>Error: Semua kolom wajib diisi!</h3>";
        echo "<a href='tambah_data.php'>Kembali ke Form</a>";

    } else {

        echo "<h2>Data Berhasil Diinput:</h2>";

        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr>
                <th>Field</th>
                <th>Data</th>
              </tr>";

        echo "<tr>
                <td>Judul Buku</td>
                <td>$judul</td>
              </tr>";

        echo "<tr>
                <td>Penulis</td>
                <td>$penulis</td>
              </tr>";

        echo "<tr>
                <td>Tahun Terbit</td>
                <td>$tahun</td>
              </tr>";

        echo "<tr>
                <td>Status</td>
                <td>$status</td>
              </tr>";

        echo "</table>";

        echo "<br><br>";
        echo "<a href='tambah_data.php'>Input Data Lagi</a>";
    }

} else {

    echo "<h3>Akses tidak valid!</h3>";
}

?>