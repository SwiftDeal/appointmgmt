<?php

/**
 * Description of hr
 *
 * @author Faizan Ayubi
 */
use Framework\RequestMethods as RequestMethods;

class HR extends Admin {
    
    /**
     * @before _secure, changeLayout
     */
    public function team() {
        $this->seo(array("title" => "Team Members", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        
        $team = Member::all(array("project_id = ?" => $this->project->id));
        $view->set("team", $team);
    }
    
    /**
     * @before _secure, changeLayout
     */
    public function projects() {
        $this->seo(array("title" => "Manage Projects", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        
        $projects = Project::all();
        $view->set("projects", $projects);
    }
    
}
