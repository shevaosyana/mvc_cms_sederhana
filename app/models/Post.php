<?php

class Post extends Model {
    public function getPosts() {
        try {
            $this->query('SELECT p.*, u.name as author_name 
                         FROM posts p 
                         JOIN users u ON p.user_id = u.id 
                         ORDER BY p.created_at DESC');
            $result = $this->resultSet();
            
            if(empty($result)) {
                echo "No posts found in database";
            }
            
            return $result;
        } catch(Exception $e) {
            echo "Error in getPosts: " . $e->getMessage();
            return [];
        }
    }

    public function addPost($data) {
        try {
            $this->query('INSERT INTO posts (title, user_id, content) VALUES(:title, :user_id, :content)');
            
            // Bind values
            $this->bind(':title', $data['title']);
            $this->bind(':user_id', $data['user_id']);
            $this->bind(':content', $data['content']);

            // Execute
            if($this->execute()) {
                return true;
            } else {
                echo "Failed to add post";
                return false;
            }
        } catch(Exception $e) {
            echo "Error in addPost: " . $e->getMessage();
            return false;
        }
    }

    public function updatePost($data) {
        try {
            $this->query('UPDATE posts SET title = :title, content = :content WHERE id = :id');
            
            // Bind values
            $this->bind(':id', $data['id']);
            $this->bind(':title', $data['title']);
            $this->bind(':content', $data['content']);

            // Execute
            if($this->execute()) {
                return true;
            } else {
                echo "Failed to update post";
                return false;
            }
        } catch(Exception $e) {
            echo "Error in updatePost: " . $e->getMessage();
            return false;
        }
    }

    public function getPostById($id) {
        try {
            $this->query('SELECT p.*, u.name as author_name 
                         FROM posts p 
                         JOIN users u ON p.user_id = u.id 
                         WHERE p.id = :id');
            $this->bind(':id', $id);

            $result = $this->single();
            
            if(!$result) {
                echo "Post not found with ID: " . $id;
            }
            
            return $result;
        } catch(Exception $e) {
            echo "Error in getPostById: " . $e->getMessage();
            return null;
        }
    }

    public function deletePost($id) {
        try {
            $this->query('DELETE FROM posts WHERE id = :id');
            $this->bind(':id', $id);

            if($this->execute()) {
                return true;
            } else {
                echo "Failed to delete post";
                return false;
            }
        } catch(Exception $e) {
            echo "Error in deletePost: " . $e->getMessage();
            return false;
        }
    }
} 