<?php
	
interface iIntervalRest {
	/* Insert intervals */
	public function post(int $start_date, int $end_date, float $price);
	/* Update Intervals */
	public function put(int $interval, int $start_date, int $end_date, float $price);
	/* Delete Intervals */
	public function delete();
}	


?>