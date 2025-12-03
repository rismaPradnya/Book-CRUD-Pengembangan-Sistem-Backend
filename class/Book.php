<?php
require_once 'Database.php';

class Book {
    private $conn;
    private $table = "books";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // CREATE
    public function create($data) {
        $sql = "INSERT INTO ".$this->table." (title, author, year_published, pages, category, cover_path, status) 
                VALUES (:title, :author, :year_published, :pages, :category, :cover_path, :status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }

    // READ ALL
    public function readAll() {
        $stmt = $this->conn->query("SELECT * FROM ".$this->table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ SINGLE
    public function read($id) {
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table." WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id, $data) {
        $sql = "UPDATE ".$this->table." SET 
                title=:title, author=:author, year_published=:year_published, 
                category=:category, cover_path=:cover_path, status=:status
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM ".$this->table." WHERE id=:id");
        return $stmt->execute(['id' => $id]);
    }
}
