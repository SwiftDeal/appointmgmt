<?php

/**
 * Class controlling appointment - scheduling, editing etc.
 *
 * @author Hemant Mann
 */
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

class Appointments extends Admin {

	/**
	 * @before _secure, changeLayout
	 */
	public function index() {
		$this->seo(array("title" => "Schedule Your Appointments", "view" => $this->getLayoutView()));
        $this->getLayoutView()->set("cal", true);
        $view = $this->getActionView();
	}

	/**
	 * @before _secure
	 */
	public function schedule() {
		if (RequestMethods::post("action") == "addEvent") {
			$date = RequestMethods::post("date");
			$date = explode("T", $date);
			$apptmt = new Appointment(array(
				"user_id" => $this->user->id,
				"title" => RequestMethods::post("title"),
				"location" => RequestMethods::post("location"),
				"start" => $date[0]." 00:00:00",
				"end" => $date[0]. " 23:59:59",
				"allDay" => true,
				"live" => true,
				"deleted" => false
			));
			$apptmt->save();
		}
		self::redirect("/appointments");
	}

	/**
	 * @before _secure
	 */
	public function delete($appointId) {
		$this->noview();
		$apptmt = Appointment::first(array("id = ?" => $appointId));
		if ($apptmt->delete()) {
			echo true;
		} else {
			echo false;
		}
	}

	/**
	 * @before _secure
	 */
	public function all() {
		$this->noview();
		$results = Appointment::all();
		$events = array();

		foreach ($results as $r) {
			$events[] = array(
				"title" => $r->title,
				"start" => explode(" ", $r->start)[0],
				"end" => explode(" ", $r->end)[0],
				"allDay" => ($r->allDay) ? true : false,
				"id" => $r->id
			);
		}

		echo json_encode($events);
	}

}