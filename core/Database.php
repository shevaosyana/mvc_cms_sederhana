<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo 'Connection Error: ' . $this->error;
            die();
        }
    }

    public function query($sql) {
        try {
            $this->stmt = $this->dbh->prepare($sql);
        } catch(PDOException $e) {
            echo 'Query Error: ' . $e->getMessage();
            die();
        }
    }

    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        try {
            $this->stmt->bindValue($param, $value, $type);
        } catch(PDOException $e) {
            echo 'Binding Error: ' . $e->getMessage();
            die();
        }
    }

    public function execute() {
        try {
            return $this->stmt->execute();
        } catch(PDOException $e) {
            echo 'Execute Error: ' . $e->getMessage();
            die();
        }
    }

    public function resultSet() {
        try {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            echo 'Result Set Error: ' . $e->getMessage();
            die();
        }
    }

    public function single() {
        try {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            echo 'Single Result Error: ' . $e->getMessage();
            die();
        }
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
} 