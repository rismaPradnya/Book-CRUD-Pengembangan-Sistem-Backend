<?php
require_once 'class/Database.php';

$db = new Database();
$conn = $db->getConnection();

if($conn){
    echo "Koneksi database berhasil!";
} else {
    echo "Koneksi database gagal!";
}
