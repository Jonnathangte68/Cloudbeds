<?php


abstract class Interval 
{
    private $start_date = null;
    private $end_date = null;
    private $price = null; 
    abstract public function setStartDate(int $start_date);
    abstract public function getStartDate();
    abstract public function setEndDate(int $end_date);
    abstract public function getEndDate();
    abstract public function setPrice(float $price);
    abstract public function getPrice();

}

?>