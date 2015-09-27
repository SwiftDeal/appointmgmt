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

    public function register() {
        $this->defaultLayout = "layouts/blank";
        $this->setLayout();
        $this->seo(array("title" => "Register", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if (RequestMethods::post("action") == "register") {
            $exist = User::first(array("email = ?" => RequestMethods::post("email")));
            if (!$exist) {
                $user = new User(array(
                    "name" => RequestMethods::post("name"),
                    "email" => RequestMethods::post("email"),
                    "password" => sha1(RequestMethods::post("password")),
                    "phone" => RequestMethods::post("phone"),
                    "admin" => FALSE,
                    "gender" => "male"
                ));
                $user->save();
                $view->set("message", "Your account has been created contact HR to activate");
            } else {
                $view->set("message", 'Account exists, login from <a href="/admin/login">here</a>');
            }
        }
    }

    public function login() {
        $this->defaultLayout = "layouts/blank";
        $this->setLayout();
        $this->seo(array("title" => "Login", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if (RequestMethods::post("action") == "login") {
            $user = User::first(array(
                "email = ?" => RequestMethods::post("email"),
                "password = ?" => sha1(RequestMethods::post("password")),
                "live" => TRUE
            ));
            if ($user) {
                $this->setUser($user);
                self::redirect("/admin");
            } else {
                $view->set("message", "User not exist or blocked");
            }
        }
    }

    public function logout() {
        $this->setUser(false);
        self::redirect("/login");
    }
}