<?php
// create.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku Baru</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    <a href="index.php">Kembali ke Daftar Buku</a>
    <form action="store.php" method="post" enctype="multipart/form-data">
        <label>Judul:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Penulis:</label><br>
        <input type="text" name="author" required><br><br>

        <label>Tahun Terbit:</label><br>
        <input type="number" name="year_published" min="0" required><br><br>

        <label>Jumlah Halaman:</label><br>
        <input type="number" name="pages" min="1" required><br><br>


        <label>Kategori:</label><br>
        <select name="category" required>
            <option value="">--Pilih Kategori--</option>
            <option value="Fiksi">Fiksi</option>
            <option value="Non-Fiksi">Non-Fiksi</option>
            <option value="Teknologi">Teknologi</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </select><br><br>

        <label>Cover Buku (jpg/png, max 2MB):</label><br>
        <input type="file" name="cover"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
