<?php
require_once "config/Database.php";

class Vtuber
{
    private $conn;
    private $table = "vtuber";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "
            SELECT 
                v.*, 
                a.name AS agency_name
            FROM " . $this->table . " v
            LEFT JOIN agency a ON v.agency_id = a.id
            ORDER BY v.id ASC
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

    public function create($name, $debut_date, $agency_id)
    {
        $query = "INSERT INTO " . $this->table . " (name, debut_date, agency_id)
                  VALUES (:name, :debut_date, :agency_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':debut_date', $debut_date);
        $stmt->bindParam(':agency_id', $agency_id);

        return $stmt->execute();
    }

    public function update($id, $name, $debut_date, $agency_id)
    {
        $query = "UPDATE " . $this->table . "
                  SET name = :name, debut_date = :debut_date, agency_id = :agency_id
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':debut_date', $debut_date);
        $stmt->bindParam(':agency_id', $agency_id);

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
