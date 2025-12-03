<?php
// create.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3e8ff; /* ungu pastel lembut */
            color: #3d1f5b; /* ungu agak tua */
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #5e2d8c; /* ungu agak tua */
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #e0c3ff; /* ungu pastel */
            padding: 20px;
            border-radius: 15px; /* sudut melengkung */
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 10px; /* sudut melengkung */
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #5e2d8c; /* ungu tua */
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #7a40b0; /* ungu hover lebih terang */
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            color: #5e2d8c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Tambah Buku</h1>
    <a href="index.php">← Kembali ke Daftar Buku</a>
    <form action="store.php" method="post" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="title" required>

        <label>Penulis:</label>
        <input type="text" name="author" required>

        <label>Tahun Terbit:</label>
        <input type="number" name="year_published" min="0" required>

        <label>Jumlah Halaman:</label>
        <input type="number" name="pages" min="1" required>

        <label>Kategori:</label>
        <select name="category" required>
            <option value="">--Pilih Kategori--</option>
            <option value="Fiksi">Fiksi</option>
            <option value="Non-Fiksi">Non-Fiksi</option>
            <option value="Teknologi">Teknologi</option>
        </select>

        <label>Status:</label>
        <select name="status" required>
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </select>

        <label>Cover Buku:</label>
        <input type="file" name="cover">

        <button type="submit">Simpan Buku</button>
    </form>
</body>
</html>
