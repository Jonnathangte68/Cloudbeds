<?php

require_once 'JobClass.php';
require_once 'IntervalRest.php';
require_once 'Database.php';
require_once 'ResultCalculator.php';
require_once 'ResultsFormatter.php';






class TaskManager implements iIntervalRest 
{
	/* GET: List all Job records */
	public function get() 
	{
		$r = new ResultCalculator();
		$db= new Database();
		$objFormatter= new Formatter();
		$output = array();
		foreach ($db->getIntervals() as $interval) 
		{
			$job = new Job($interval["start_date"], $interval["end_date"], $interval["price"]);
			$r->addElement($job);
			array_push($output, array(
				'step' => $interval["id"], 
				'operation' => $objFormatter->formatOpColumn($interval["start_date"], $interval["end_date"], $interval["price"]), 
				'result' => $objFormatter->format($r->getResult()[count($r->getResult())-1])
			));
		}
		return $output;
	}

	public function post(int $start_date, int $end_date, float $price) 
	{
		$db= new Database();
		$new_job = new Job($start_date, $end_date, $price);
		$db->insertInterval($new_job->getStartDate(), $new_job->getEndDate(), $new_job->getPrice());
	}

	/* Update Intervals */

	public function put(int $interval, int $start_date, int $end_date, float $price) 
	{
	}

	/* Delete Intervals */

	public function delete() 
	{
		$db= new Database();
		$db->deleteIntervals();
	}


}









?>