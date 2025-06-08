<?php

class User extends Model {
    public function register($data) {
        $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
        
        // Bind values
        $this->bind(':name', $data['name']);
        $this->bind(':email', $data['email']);
        $this->bind(':password', $data['password']);

        // Execute
        if($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->query('SELECT * FROM users WHERE email = :email');
        $this->bind(':email', $email);

        $row = $this->single();

        if($row) {
            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            }
        }

        return false;
    }

    public function findUserByEmail($email) {
        $this->query('SELECT * FROM users WHERE email = :email');
        $this->bind(':email', $email);

        $row = $this->single();

        if($this->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
} 