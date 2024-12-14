<?php

namespace Bibliothek\Gateway;

use PDO;

class BasicTableGateway {
    private PDO $connection;
    protected string $table;
    protected string $primary = "id";

    public function __construct() {
        $this -> connection = new PDO("mysql:host=mysql;dbname=bibliothek", "root", "test05");
    }

    public function all(): array {
        $sql = $this->connection->prepare("select * From $this->table");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(array $data): int {
        $columns = implode(",", array_Keys($data));
        $placeholders = str_repeat("?, ", count($data) - 1) . "?";
        $values = array_values($data);

        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($values);

        return $this->connection->lastInsertId();
    }

    public function findById(int $id) : array|false {
        $sql = $this->connection->prepare("SELECT * FROM $this->table WHERE $this->primary = $id");
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, array $data) {
        $values = [];
        $columns = "";

        foreach( $data as $key=>$value) {
            $columns .= "$key = ?,";
            $values[] = $value;
        }

        $columns = rtrim($columns, ",");

        $sql = "UPDATE $this->table SET $columns WHERE $this->primary = $id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($values);
    }

    public function delete(int $id): void {
        $sql = $this->connection->prepare("DELETE FROM $this->table WHERE $this->primary = $id");
        $sql->execute();
    }
}