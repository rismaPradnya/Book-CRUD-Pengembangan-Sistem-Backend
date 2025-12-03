<?php
require_once 'class/Book.php';
if(!isset($_GET['id'])) die("ID tidak ditemukan");

$book = new Book();
$book->delete($_GET['id']);
header("Location: index.php");
exit;
