<?php
require_once 'class/Book.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Form harus disubmit melalui POST");
}

$book = new Book();

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$year_published = $_POST['year_published'];
$pages = $_POST['pages'];
$category = $_POST['category'];
$status = $_POST['status'];

// Handle file upload
$coverPath = null;
if(isset($_FILES['cover']) && $_FILES['cover']['error'] == 0){
    $allowedTypes = ['image/jpeg','image/png'];
    if(in_array($_FILES['cover']['type'], $allowedTypes) && $_FILES['cover']['size'] <= 2*1024*1024){
        $ext = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
        $coverPath = 'uploads/' . time() . '_' . rand(1000,9999) . '.' . $ext;
        move_uploaded_file($_FILES['cover']['tmp_name'], $coverPath);
    } else {
        die("File tidak valid atau terlalu besar.");
    }
}

// Update data
$data = [
    'id' => $id,
    'title' => $title,
    'author' => $author,
    'year_published' => $year_published,
    'pages' => $pages,
    'category' => $category,
    'status' => $status
];

if ($coverPath) {
    $data['cover_path'] = $coverPath; // update cover jika ada
}

$book->update($data);

header("Location: index.php");
exit;
