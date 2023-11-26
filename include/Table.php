<?php
include_once "Logger.php";

use Katzgrau\KLogger\Logger;

class Table {
    private $pdo;
    private $table;
    private $primaryKey;
    private $log;

    public function __construct(PDO $pdo, Logger $log, string $table, string $primaryKey='') {
        $this->pdo = $pdo;
        $this->log = $log;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function select($sql) {
        $stmt = $this->action($sql);
        return $stmt->fetchAll();
    }

    public function delete($sql) {
        return $this->action($sql);
    }

    public function update($sql) {
        return $this->action($sql);
    }

    public function insert($sql) {
        return $this->action($sql);
    }

    public function last_insert_id() {
        return $this->pdo->lastInsertId();
    }

    private function action($sql) {
        try {
            $this->log->info(($_SESSION['email'] ?? 'Anonymous').', '.basename($_SERVER['SCRIPT_FILENAME']).', '.$sql);
            $stmt = $this->pdo->query($sql);
        } catch (PDOException $e) {
            $this->log->error($e->getMessage());
            echo $e->getMessage();
        }
        return $stmt;
    }
}