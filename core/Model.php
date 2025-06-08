<?php

class Model {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    protected function query($query) {
        return $this->db->query($query);
    }

    protected function bind($param, $value, $type = null) {
        return $this->db->bind($param, $value, $type);
    }

    protected function execute() {
        return $this->db->execute();
    }

    protected function resultSet() {
        return $this->db->resultSet();
    }

    protected function single() {
        return $this->db->single();
    }

    protected function rowCount() {
        return $this->db->rowCount();
    }
} 