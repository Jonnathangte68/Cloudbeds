<?php

include_once 'IntervalClass.php';

class Job extends Interval
{

	function __construct($start_date, $end_date, $price) 
	{
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->price = $price;
	}

    public function setStartDate(int $start_date) 
    {
    	$this->start_date = $start_date;
    }

    public function getStartDate() 
    {
    	return $this->start_date;
    }

    public function setEndDate(int $end_date) 
    {
    	$this->end_date = $end_date;
    }

    public function getEndDate() 
    {
    	return $this->end_date;
    }

    public function setPrice(float $price) 
    {
    	$this->price = $price;
    }

    public function getPrice() 
    {
    	return $this->price;
    }


}


?>