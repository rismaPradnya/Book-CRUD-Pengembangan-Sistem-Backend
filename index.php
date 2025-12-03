<?php
require_once 'class/Book.php';

$book = new Book();
$books = $book->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <a href="create.php">Tambah Buku Baru</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($books as $b): ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['title'] ?></td>
            <td><?= $b['author'] ?></td>
            <td><?= $b['year_published'] ?></td>
            <td><?= $b['category'] ?></td>
            <td><?= $b['status'] ?></td>
            <td>
                <a href="edit.php?id=<?= $b['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $b['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
