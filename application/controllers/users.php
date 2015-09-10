<?php

/**
 * User Controller: Handles user login/signup and related functions
 *
 * @author Hemant Mann
 */
use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;

class Users extends Controller {

    public function profile() {
        
    }

    public function logout() {
        $this->setUser(false);
        self::redirect("/login");
    }
}
