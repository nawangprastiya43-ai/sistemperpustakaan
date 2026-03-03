<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Buku</title>
</head>
<body>

    <h2>Input Data Buku</h2>

    <form method="POST" action="proses_data.php">

        <label>Judul Buku:</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="penulis" required><br><br>

        <label>Tahun Terbit:</label><br>
        <input type="number" name="tahun" required><br><br>

        <label>Status Pinjam:</label><br>
        <select name="status">
            <option value="">-- Pilih Status --</option>
            <option value="dipinjam">Sedang Dipinjam</option>
            <option value="tersedia">Tersedia</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>

    </form>

</body>
</html>