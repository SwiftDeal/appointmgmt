<?php

/**
 * Example Controller to Acess Files
 *
 * @author Faizan Ayubi
 */
use Framework\RequestMethods as RequestMethods;

class Medicine extends Admin {

	/**
     * @before _secure, changeLayout
     */
	public function create() {
		$this->seo(array("title" => "Add Medicine", "view" => $this->getLayoutView()));
		$view = $this->getActionView();

		if (RequestMethods::post("action") == "medicine") {
			$item = new Item(array(
				"title" => RequestMethods::post("title"),
				"details" => RequestMethods::post("details"),
				"price" => RequestMethods::post("price"),
				"type" => "medicine"
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

		$view->set("medicine", $item);
	}

	/**
     * @before _secure, changeLayout
     */
    public function edit($id='') {
    	$this->seo(array("title" => "Edit Medicine", "view" => $this->getLayoutView()));
    	$view = $this->getActionView();

    	$item = Item::first(array("id = ?" => $id));
    	if(RequestMethods::post("action") == "update") {
    		$item->title = RequestMethods::post("title");
    		$item->details = RequestMethods::post("details");
    		$item->price = RequestMethods::post("price");

    		$item->save();
			$view->set("success", true);
    	}

    	$view->set("medicine", $item);
    }

    /**
     * @before _secure, changeLayout
     */
	public function manage() {
		$this->seo(array("title" => "Manage Medicine", "view" => $this->getLayoutView()));
		$view = $this->getActionView();

		$page = RequestMethods::get("page", 1);
		$medicines = Item::all(array("type = ?" => "medicine"), array("*"), "id", "desc", "10", $page);

		$view->set("page", $page);
		$view->set("medicines", $medicines);
	}
}