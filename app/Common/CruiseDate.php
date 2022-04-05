<?php
namespace App\Common;

use Illuminate\Support\Collection;

class CruiseDate extends \DateTime
{
	public function __toString() {
		return $this->format('Y-m-d');
	}

	public function toLabel() {
		return $this->format('l, jS M, Y');
	}

	public function getMonth() {
		return intval($this->format('m'));
	}

	public function getDay() {
		return strtolower($this->format('D'));
	}

	public function getDays($n, $activeDays) {

		$dates = [];

		for($i=1; $i<$n+1; $i++) {
			$d = $this->add(new \DateInterval('P1D'));

			if(in_array($d->getDay(), $activeDays)) {
				$dates[] = $this->__toString();
			}
			
		}
		return $dates;
	}

	public function cruiseDateItems($n, $activeDays, $activeDates) {
		$dates = $this->getDays($n, $activeDays);
		$items = [];
		// compare with list from db.
		foreach($dates as $date) {
			$d = $this->findDate($date, $activeDates);
			if($d != null) {
				$items[] = new CruiseDateItem(
					$d->date,
					$d->day,
					$d->night,
					$d->available
				);
			} else {
				$items[] = new CruiseDateItem(
					$date,
					0,
					0,
					0
				);
			}
		}
		return $items;
	}

	public function findDate($index, $activeDates) {
		foreach($activeDates as $date) {
			if($index == $date->date) {
				return $date;
			}
		}
		return null;
	}
}