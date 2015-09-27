<?php

/**
 * User Controller: Handles user login/signup and related functions
 *
 * @author Hemant Mann
 */
use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;

class Auth extends Controller {

	public function JSONview() {
        $this->willRenderLayoutView = false;
        $this->defaultExtension = "json";
    }

    public function logout() {
        $this->setUser(false);
        self::redirect("/login");
    }
}