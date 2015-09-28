<?php

/**
 * Example Controller to Acess Files
 *
 * @author Faizan Ayubi
 */
use Framework\Controller as Controller;

class Packages extends Admin {

	/**
     * @before _secure, changeLayout
     */
	public function create() {
		$this->seo(array("title" => "Create Package", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
		$view = $this->getActionView();
	}

	public function view($id='') {
		$item = Item::first(array("id = ?" => $id));
		$this->seo(array("title" => $item->title, "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
	}

	/**
     * @before _secure, changeLayout
     */
    public function edit($id='') {
    	$this->seo(array("title" => "Edit Package", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
    }
	
	public function MassageTherapies() {
		
	}

	public function BeautyTreatment() {
		
	}

	public function CombinationalTherapies() {
		# code...
	}

	public function SeasonalTreatment() {
		# code...
	}

	public function special() {
		# code...
	}

	public function WeightLoss() {
		# code...
	}

}