<?php
require_once 'class/Book.php';

$book = new Book();

if (!isset($_GET['id'])) {
    die("ID buku tidak ditemukan.");
}

$id = $_GET['id'];
$b = $book->find($id); // ambil data buku berdasarkan id
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <style>
        body { font-family: Arial; background:#f3e8ff; color:#3d1f5b; padding:20px; }
        h1 { text-align:center; color:#5e2d8c; }
        form { max-width:500px; margin:0 auto; background:#e0c3ff; padding:20px; border-radius:15px; box-shadow:0 4px 6px rgba(0,0,0,0.1); }
        label { display:block; margin-top:15px; font-weight:bold; }
        input[type="text"], input[type="number"], select, input[type="file"] { width:100%; padding:8px; margin-top:5px; border-radius:10px; border:1px solid #ccc; box-sizing:border-box; }
        button { background:#5e2d8c; color:#fff; border:none; padding:10px 20px; margin-top:20px; border-radius:10px; cursor:pointer; font-size:16px; }
        button:hover { background:#7a40b0; }
        a { display:inline-block; margin-bottom:20px; color:#5e2d8c; text-decoration:none; }
        a:hover { text-decoration:underline; }
    </style>
</head>
<body>
    <h1>Edit Buku</h1>
    <a href="index.php">← Kembali ke Daftar Buku</a>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $b['id'] ?>">

        <label>Judul:</label>
        <input type="text" name="title" value="<?= $b['title'] ?>" required>

        <label>Penulis:</label>
        <input type="text" name="author" value="<?= $b['author'] ?>" required>

        <label>Tahun Terbit:</label>
        <input type="number" name="year_published" value="<?= $b['year_published'] ?>" required>

        <label>Jumlah Halaman:</label>
        <input type="number" name="pages" value="<?= $b['pages'] ?>" required>

        <label>Kategori:</label>
        <select name="category" required>
            <option value="Fiksi" <?= $b['category']=='Fiksi'?'selected':'' ?>>Fiksi</option>
            <option value="Non-Fiksi" <?= $b['category']=='Non-Fiksi'?'selected':'' ?>>Non-Fiksi</option>
            <option value="Teknologi" <?= $b['category']=='Teknologi'?'selected':'' ?>>Teknologi</option>
        </select>

        <label>Status:</label>
        <select name="status" required>
            <option value="active" <?= $b['status']=='active'?'selected':'' ?>>Aktif</option>
            <option value="inactive" <?= $b['status']=='inactive'?'selected':'' ?>>Tidak Aktif</option>
        </select>

        <label>Cover Buku (biarkan kosong jika tidak ingin ganti):</label>
        <input type="file" name="cover">

        <button type="submit">Update Buku</button>
    </form>
</body>
</html>
