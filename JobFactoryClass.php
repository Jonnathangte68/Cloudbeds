<?php








class JobFactory 
{
    private $job;

    public function createNewJob($start, $end, $price) 
    {
        $this->job = new Job($start, $end, $price);
        return $this->job;
    }
}









?>