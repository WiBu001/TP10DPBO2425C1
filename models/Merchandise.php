<?php
require_once "config/Database.php";

class Merchandise
{
    private $conn;
    private $table = "merchandise";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "
            SELECT 
                m.*, 
                v.name AS vtuber_name
            FROM merchandise m
            LEFT JOIN vtuber v ON m.vtuber_id = v.id
            ORDER BY m.id DESC
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

    public function create($vtuber_id, $item_name, $price)
    {
        $query = "INSERT INTO " . $this->table . " (vtuber_id, item_name, price)
                  VALUES (:vtuber_id, :item_name, :price)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':vtuber_id', $vtuber_id);
        $stmt->bindParam(':item_name', $item_name);
        $stmt->bindParam(':price', $price);

        return $stmt->execute();
    }

    public function update($id, $vtuber_id, $item_name, $price)
    {
        $query = "UPDATE " . $this->table . "
                  SET vtuber_id = :vtuber_id, item_name = :item_name, price = :price
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':vtuber_id', $vtuber_id);
        $stmt->bindParam(':item_name', $item_name);
        $stmt->bindParam(':price', $price);

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
