<?php
	/*
	 * System config and initialization
	 */
	
	include ('../init.inc.php');

	use myMvc\Controllers\UserController;

	/*
	 * Router
	 */
	
        
        if (matchRoute('/users')) {
            
            // user index
            if (isMethod('GET')) {
                $UserController = new UserController();
                
                $UserController->index();
            }
            elseif (isMethod('POST')) {
                // empty for now
            }
        }
        elseif (matchRoute('/users/insert')) {
            
            // new user insert form
            if (isMethod('GET')) {
                $UserController = new UserController();
                
                $UserController->insertFormUser();
            }
            // insert new user
            elseif (isMethod('POST')) {
                
                // put POST values in array !!INSERT SECURITY CHECK HERE!!
                $insert = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password']
                );
                
                $UserController = new UserController();
                
                $UserController->insertUser($insert['name'], $insert['email'], $insert['username'], $insert['password']);
            }
        }
        elseif ($matches = matchRoute('/users/:id')) {

            $id = $matches[0];
            
            // show single user data
            if (isMethod('GET')) {
                $UserController = new UserController();
                
                $UserController->getUser($id);
            }
            elseif (isMethod('POST')) {
                // empty for now
                
            }
        }
        elseif ($matches = matchRoute('/users/:id/update')) {
            
            $id = $matches[0];
            
            // show user update form
            if (isMethod('GET')) {
                
                $UserController = new UserController();
                
                $UserController->updateFormUser($id);
            }
            // update user
            elseif (isMethod('POST')) {
                
                // put POST values in array !!INSERT SECURITY CHECK HERE!!
                $update = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password']
                );
                
                $UserController = new UserController();
                
                $UserController->updateUser($id, $update['name'], $update['email'], $update['username'], $update['password']);
            }
        }
        elseif ($matches = matchRoute('/users/:id/delete')) {
            $id = $matches[0];
            
            // show user delete form
            if (isMethod('GET')) {
                
                $UserController = new UserController();
                
                $UserController->deleteFormUser($id);
            }
            // delete user
            elseif (isMethod('POST')) {
                                
                $UserController = new UserController();
                
                $UserController->deleteUser($id);
            }
        }
                
