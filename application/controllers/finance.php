<?php

/**
 * Description of finance
 *
 * @author Faizan Ayubi
 */
use Framework\RequestMethods as RequestMethods;

class Finance extends Admin {

    /**
     * Shows all project expenses
     * 
     * @before _secure, changeLayout
     */
    public function add() {
        $this->seo(array("title" => "Add Payment", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
    
    /**
     * Shows all project expenses
     * 
     * @before _secure, changeLayout
     */
    public function index() {
        $this->seo(array("title" => "Finance", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        if (RequestMethods::get("created")) {
            $page = RequestMethods::get("page", 1);
            $date = RequestMethods::get("created");
            $payments = Payment::all(array("created LIKE ?" => "%{$date}%"), array("*"), "id", "desc", "10", $page);
            
            $view->set("payments", $payments);
            $view->set("page", $page);
        }
    }
    
    /**
     * Show session wise project expenses
     * 
     * @before _secure, changeLayout
     */
    public function expenses() {
        $this->seo(array("title" => "Dashboard", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        
        if(RequestMethods::post("action") == "expenses") {
            $payment = new Payment(array(
                "user_id" => $this->user->id,
                "project_id" => $this->project->id,
                "amount" => RequestMethods::post("amount"),
                "comment" => RequestMethods::post("comment")
            ));
            $payment->save();
            $view->set("message", "Saved Successfully");
        }
        
        $payments = Payment::all(array("project_id = ?" => $this->project->id));
        $view->set("payments", $payments);
    }
}
