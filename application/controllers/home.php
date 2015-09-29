<?php

/**
 * The Default Example Controller Class
 *
 * @author Faizan Ayubi
 */
use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;

class Home extends Controller {

    public function index() {
        $view = $this->getActionView();
        if (RequestMethods::post("action") == "appointment") {
            $user = new User(array(
                "name" => RequestMethods::post("name"),
                "email" => RequestMethods::post("email"),
                "password" => sha1(rand(100000, 9999999)),
                "phone" => RequestMethods::post("contact"),
                "admin" => FALSE,
                "gender" => RequestMethods::post("gender")
            ));
            $user->save();
            
            $appointment = new Appointment(array(
                "user_id" => $user->id,
                "title" => RequestMethods::post("service"), 
                "start" => RequestMethods::post("date"),
                "end" => RequestMethods::post("date"),
                "allDay" => "1",
                "location" => RequestMethods::post("location")
            ));
            $appointment->save();
        }
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }

    public function contact() {
        $this->seo(array("title" => "Contact Us", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        //@sunilwnz@gmail.com
    }

    public function about() {
        $this->seo(array("title" => "About Us", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }

    public function ayurveda() {
        $this->seo(array("title" => "Why Ayurveda?", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
    
    public function feedback() {
        $this->seo(array("title" => "Users Feedback", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }

    public function quesans() {
        $this->seo(array("title" => "Dashboard", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }

}
