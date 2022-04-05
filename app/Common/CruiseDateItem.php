<?php
namespace App\Common;

class CruiseDateItem
{

	private $date;
	private $day;
	private $night;
	private $available;

	public function __construct($date, $day, $night, $available) {
		$this->date = $date;
		$this->day = intval($day);
		$this->night = intval($night);
		$this->available = intval($available);
	}

	public function getDate() {
		return $this->date;
	}

	public function isDay() {
		return intval($this->day) === 1;
	}

	public function isNight() {
		return intval($this->night) === 1;
	}

	public function isAvailable() {
		return intval($this->available) === 1;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function setDay($day) {
		$this->day = $day;
	}

	public function setNight($night) {
		$this->night = $night;
	}

	public function setAvailable($available) {
		$this->available = $available;
	}

	public function getLabel() {
		$d = new CruiseDate($this->getDate());
		return $d->toLabel();
	}
}