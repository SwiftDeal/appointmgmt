<?php

/**
 * Example Controller to Acess Files
 *
 * @author Faizan Ayubi
 */
use Framework\Controller as Controller;
use Framework\RequestMethods as RequestMethods;

class Package extends Admin {

	/**
     * @before _secure, changeLayout
     */
	public function create() {
		$this->seo(array("title" => "Create Package", "view" => $this->getLayoutView()));
		$view = $this->getActionView();

		if (RequestMethods::post("action") == "create") {
			$item = new Item(array(
				"title" => RequestMethods::post("title"),
				"details" => RequestMethods::post("details"),
				"price" => RequestMethods::post("price"),
				"type" => "package"
			));
			$item->save();
			$view->set("success", true);
		}
	}

	public function details($title, $id='') {
		$item = Item::first(array("id = ?" => $id));
		$this->seo(array(
			"title" => $item->title,
			"keywords" => $item->title,
			"description" => substr(strip_tags($item->details), 0, 150),
			"view" => $this->getLayoutView()
		));
		$view = $this->getActionView();

		$view->set("package", $item);
	}

	/**
     * @before _secure, changeLayout
     */
    public function edit($id='') {
    	$this->seo(array("title" => "Edit Package", "keywords" => "admin", "description" => "admin", "view" => $this->getLayoutView()));
    }

    /**
     * @before _secure, changeLayout
     */
	public function manage() {
		$this->seo(array("title" => "Manage Package", "view" => $this->getLayoutView()));
		$view = $this->getActionView();

		$page = RequestMethods::get("page", 1);
		$packages = Item::all(array(), array("*"), "id", "desc", "10", $page);

		$view->set("page", $page);
		$view->set("packages", $packages);
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