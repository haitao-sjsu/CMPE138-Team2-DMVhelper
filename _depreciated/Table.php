<?php
include_once "Logger.php";

use Katzgrau\KLogger\Logger;
use Psr\Log\LogLevel;

class Table {
    private $pdo;
    private $table;
    private $primaryKey;
    private $log;

    public function __construct(PDO $pdo, string $table, string $primaryKey='') {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->log = new Logger('log/', LogLevel::INFO);
    }

    public function find($field, $value, $option = '') {
        $query = "SELECT * FROM {$this->table} WHERE {$field} = :value {$option}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['value' => $value]);
        $this->log->info($query);
        return $stmt->fetchAll();
    }

    public function find_multi($sql) {
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function findAll($option='') {
        $query = "SELECT * FROM {$this->table} {$option}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function save($record) {
        try {
            if (empty($record[$this->primaryKey])) {
                unset($record[$this->primaryKey]);
            }
            $this->insert($record);
        } catch (PDOException $e) {
            $this->update($record);
        }
    }

    public function last_insert_id() {
        return $this->pdo->lastInsertId();
    }

    public function delete($field, $value) {
        $query = "DELETE FROM {$this->table} WHERE {$field} = :value";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['value' => $value]);
    }

    private function update($value) {
        $query = "UPDATE {$this->table} SET ";
        foreach ($value as $key => $field) {
            $query .= "{$key} = :{$key}, ";
        }
        $query = rtrim($query, ', ');
        $query .= " WHERE {$this->primaryKey} = :primaryKey";
        $value['primaryKey'] = $value[$this->primaryKey];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($value);
    }

    private function insert($value) {
        $query = "INSERT INTO {$this->table} (";
        foreach ($value as $key => $field) {
            $query .= "{$key}, ";
        }
        $query = rtrim($query, ', ');
        $query .= ") VALUES (";
        foreach ($value as $key => $field) {
            $query .= ":{$key}, ";
        }
        $query = rtrim($query, ', ');
        $query .= ")";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($value);
    }
}