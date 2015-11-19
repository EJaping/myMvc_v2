<?php
namespace myMvc\Controllers;

use myMvc\Models\UserModel;

    class UserController {
        
        /**
         * Constructor. Initiates a new UserModel
         */
        public function __construct() {
            $this->UserModel = new UserModel();
            
        }
        
        /**
         * Show a list of users
         */
        public function index() {
                       
            $users = $this->UserModel->getArray();
            
            include('views/user/index.php');
        }
         /**
          * Show a single user
          * 
          * @param integer $id
          */
        public function getUser($id) {
            $user = $this->UserModel->getRow($id);
            
            include('views/user/show.php');
        }
        
        /**
         * Show user update form, already filled in with the old values
         * 
         * @param integer $id
         */
        public function updateFormUser($id) {
            $user = $this->UserModel->getRow($id);
            
            include("views/user/update.php");
        }
        
        /**
         * Update a user
         * 
         * @param integer $id
         * @param string $name
         * @param string $email
         * @param string $username
         * @param string $password
         */
        public function updateUser($id, $name, $email, $username, $password) {
            $user = $this->UserModel->updateUser($id, $name, $email, $username, $password);
            
            include("views/user/updateDone.php");
        }
        
        /**
         * Show new user insert form
         */
        public function insertFormUser() {
            
            include("views/user/insert.php");
        }
        
        /**
         * Insert a new user, show inserted data
         * 
         * @param string $name
         * @param string $email
         * @param string $username
         * @param string $password
         */
        public function insertUser($name, $email, $username, $password) {
            $user = $this->UserModel->insertUser($name, $email, $username, $password);
            
            include("views/user/insertedUser.php");
        }
        
        /**
         * Show the user delete form
         * 
         * @param type $id
         */
        public function deleteFormUser($id) {
            $user = $this->UserModel->getRow($id);
            
            include("views/user/delete.php");
        }
        
        /**
         * Delete a user
         * 
         * @param integer $id
         */
        public function deleteUser($id) {
            $user = $this->UserModel->deleteUser($id);
                        
            include("views/user/deleted.php");
        }
    }