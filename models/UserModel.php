<?php
namespace myMvc\Models;

use myMvc\Services\Database;

    class UserModel {
        
        public function __construct() {
            
        }
        
        /**
         * Get all users from the db
         * @return array Collection of users
         */
        public function getArray() {
            
            // Prepare and execute statement
            $sql = 'SELECT * FROM user';
            $stmt = Database::conn()->prepare($sql);
            $stmt->execute();
            
            // Fetch in an array
            $collection = $stmt->fetchAll();
            
            // Return the collection of users
            return $collection;
        }
        
        /**
         * Get a single row (user) from the db based on user ID
         * @param integer $id
         * @return array User
         */
        public function getRow($id) {
            // array for prepared statement
            $userId = array(
                'id' => $id
            );
            
            
            // prepare and execute statement
            $sql = 'SELECT * FROM user WHERE id = :id';
            $stmt = Database::conn()->prepare($sql);
            $stmt->execute($userId);
            
            // fetch as associated array
            $user = $stmt->fetch();
            
            // return the user array
            return $user;
        }
        
        /**
         * Have to encrypt password!!!
         * 
         * Update user info in the db, based on user ID
         * 
         * @param int $id
         * @param string $name
         * @param string $email
         * @param string $username
         * @param string $password
         */
        public function updateUser($id, $name, $email, $username, $password) {
            // prepare update statement
            $stmt = Database::conn()->prepare("UPDATE user SET name = :name, email = :email, username = :username, password = :password WHERE id = :id");
            
            // prepare input array and execute
            $userData = array (
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'id' => $id
            );
            
            $stmt->execute($userData);
            
            // Show results in array
            $user = array(
                    'name' => $name,
                    'email' => $email,
                    'username' => $username,
                    'password' => $password
                    );
            
            return $user;
        }
        
        /**
         * Insert a new row (user) into the db
         * 
         * @param string $name
         * @param string $email
         * @param string $username
         * @param string $password
         * @return array Last inserted user
         */
        public function insertUser($name, $email, $username, $password) {
            // set userdata in array
            $newUser = array(
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'password' => $password
            );

            // prepare insert statement
            $stmt = Database::conn()->prepare("INSERT INTO user (name, email, username, password) VALUES (:name, :email, :username, :password)");
            $stmt->execute($newUser);
            
            // return last inserted user in db
            $id = Database::conn()->lastInsertId();
            $user = $this->getRow($id);

            return $user;
        }
        
        /**
         * Delete a row (user) in the db.
         * 
         * @param type $id
         */
        public function deleteUser($id) {
            // array for prepared statement
            $userId = array(
                'id' => $id
            );
            
            
            // prepare and execute statement
            $sql = 'DELETE FROM user WHERE id = :id';
            $stmt = Database::conn()->prepare($sql);
            $stmt->execute($userId);
            
        }
        
    }
    
    