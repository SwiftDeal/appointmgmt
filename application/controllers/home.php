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

    public function gallery() {
        $this->seo(array("title" => "Treatment Center Gallery", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
}
