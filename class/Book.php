<?php
require_once 'Database.php';

class Book {
    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=book_crud;charset=utf8", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function all() {
        $stmt = $this->conn->query("SELECT * FROM books ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $sql = "INSERT INTO books (title, author, year_published, pages, category, cover_path, status)
                VALUES (:title, :author, :year_published, :pages, :category, :cover_path, :status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($data){
        $fields = "title=:title, author=:author, year_published=:year_published, pages=:pages, category=:category, status=:status";
        if(isset($data['cover_path'])){
            $fields .= ", cover_path=:cover_path";
        }
        $sql = "UPDATE books SET $fields WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM books WHERE id=:id");
        $stmt->execute(['id'=>$id]);
    }
}
?>
