<?php
require_once 'class/Book.php';
$book = new Book();
$books = $book->all();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <style>
        body { font-family: Arial; background:#f3e8ff; color:#3d1f5b; padding:20px;}
        h1 { text-align:center; color:#5e2d8c; }
        a.button {
            display:inline-block; padding:10px 15px; background:#5e2d8c; color:#fff;
            border-radius:10px; text-decoration:none; margin-bottom:10px;
        }
        a.button:hover { background:#7a40b0; }
        table { width:100%; border-collapse: collapse; margin-top:10px;}
        th, td { border:1px solid #ccc; padding:8px; text-align:center;}
        th { background:#e0c3ff; }
        img { width:60px; border-radius:5px;}
        .action a { margin:0 5px; padding:5px 10px; border-radius:10px; text-decoration:none; color:#fff;}
        .edit { background:#5e2d8c; } .edit:hover { background:#7a40b0; }
        .delete { background:#c53dff; } .delete:hover { background:#a22ddb; }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <a href="create.php" class="button">Tambah Buku</a>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Halaman</th>
                <th>Kategori</th><th>Status</th><th>Cover</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $b): ?>
            <tr>
                <td><?= $b['id'] ?></td>
                <td><?= $b['title'] ?></td>
                <td><?= $b['author'] ?></td>
                <td><?= $b['year_published'] ?></td>
                <td><?= $b['pages'] ?></td>
                <td><?= $b['category'] ?></td>
                <td><?= $b['status'] ?></td>
                <td><?= $b['cover_path']? "<img src='".$b['cover_path']."'>" : "-" ?></td>
                <td class="action">
                    <a href="edit.php?id=<?= $b['id'] ?>" class="edit">Edit</a>
                    <a href="delete.php?id=<?= $b['id'] ?>" class="delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
