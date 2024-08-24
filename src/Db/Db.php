<?php

namespace App\Db;

class Db {
  protected \PDO $db;

  public function __construct(string $user = "root", string $password = "root_password", string $host = "localhost", string $dbname = "php8")
  {
      $dsn = "mysql:host=$host;dbname=$dbname";
      $this->db = new \PDO($dsn, $user, $password);
  }

  public function getAll(string $table): array
  {
      $sql = "SELECT * FROM $table";
      return $this->executeQuery($sql)->fetchAll();
  }

  public function getOne(int $id, string $table): array
  {
      $sql = "SELECT * FROM $table WHERE id = :id";
      return $this->executeQuery($sql, [':id' => $id])->fetch();
  }

  public function getOneBy(string $col, string $value, string $table): array
  {
      $sql = "SELECT * FROM $table WHERE $col = '$value'";
      return $this->executeQuery($sql)->fetch();
  }

  public function insert(string $fields, string $values, string $table): bool
  {
      $sql = "INSERT INTO $table ($fields) VALUES ($values)";
      return $this->executeNonQuery($sql);
  }

  public function update(int $id, string $fields, string $values, string $table): void
  {
      $sql = "UPDATE $table SET $fields = $values WHERE id = :id";
      $this->executeNonQuery($sql, [':id' => $id]);
  }

  public function delete(int $id, string $table): void
  {
      $sql = "DELETE FROM $table WHERE id = :id";
      $this->executeNonQuery($sql, [':id' => $id]);
  }

  public function genericSelect(string $fields, string $table): array
  {
      $sql = "SELECT $fields FROM $table";
      return $this->executeQuery($sql)->fetchAll();
  }

  public function genericSelectWhere(string $fields, string $table, string $where): array
  {
      $sql = "SELECT $fields FROM $table WHERE $where";
      return $this->executeQuery($sql)->fetchAll();
  }

  private function executeQuery(string $sql, array $params = []): \PDOStatement
  {
      $query = $this->db->prepare($sql);
      $query->execute($params);
      return $query;
  }

  private function executeNonQuery(string $sql, array $params = []): bool
  {
      $query = $this->executeQuery($sql, $params);
      return $query->rowCount() > 0;
  }
}
