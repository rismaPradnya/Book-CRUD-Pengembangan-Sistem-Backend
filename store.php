<?php
require_once 'class/Book.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') die("Form harus POST");

$book = new Book();

$title = $_POST['title'];
$author = $_POST['author'];
$year_published = $_POST['year_published'];
$pages = $_POST['pages'];
$category = $_POST['category'];
$status = $_POST['status'];

$coverPath = null;
if(isset($_FILES['cover']) && $_FILES['cover']['error']==0){
    $allowed = ['image/jpeg','image/png'];
    if(in_array($_FILES['cover']['type'],$allowed) && $_FILES['cover']['size']<=2*1024*1024){
        $ext = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
        $coverPath = 'uploads/'.time().'_'.rand(1000,9999).'.'.$ext;
        move_uploaded_file($_FILES['cover']['tmp_name'],$coverPath);
    } else die("File tidak valid atau terlalu besar");
}

$data = compact('title','author','year_published','pages','category','status');
$data['cover_path'] = $coverPath;

$book->create($data);
header("Location: index.php");
exit;
