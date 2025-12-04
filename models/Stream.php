<?php
require_once "config/Database.php";

class Stream
{
    private $conn;
    private $table = "stream";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // contoh di models/Stream.php
    public function getAll()
    {
        $query = "
        SELECT s.*, v.name AS vtuber_name
        FROM stream s
        LEFT JOIN vtuber v ON s.vtuber_id = v.id
        ORDER BY s.stream_date DESC
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($vtuber_id, $title, $stream_date)
    {
        $query = "INSERT INTO " . $this->table . " (vtuber_id, title, stream_date)
                  VALUES (:vtuber_id, :title, :stream_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':vtuber_id', $vtuber_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':stream_date', $stream_date);

        return $stmt->execute();
    }

    public function update($id, $vtuber_id, $title, $stream_date)
    {
        $query = "UPDATE " . $this->table . "
                  SET vtuber_id = :vtuber_id, title = :title, stream_date = :stream_date
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':vtuber_id', $vtuber_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':stream_date', $stream_date);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
