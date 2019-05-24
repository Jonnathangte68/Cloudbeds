<?php

require_once 'JobClass.php';
require_once 'IntervalRest.php';
require_once 'Database.php';
require_once 'ResultCalculator.php';
require_once 'ResultsFormatter.php';


class TestCase1 {
   public function test() {

	   	$r= new ResultCalculator();
	   	$job = new Job(1, 10, 15);
	   	$r->addElement($job);

	   	foreach ($r->getResult() as $result1) 
	   	{
	   		
	   		foreach ($result1 as $result2) 
	   		{
	   			

	   			if($result2->getStartDate()===1) 
	   			{
			   		echo "<br><p style='color:green;'>TEST VALIDATION SUCCESS 1/3 VERIFIED</p><br>";
			   	}else 
			   	{
			   		echo "<br><p style='color:red;'>TEST VALIDATION ERROR 1/3 FAILS</p><br>";
			   	}
			   	if($result2->getEndDate()===10) 
			   	{
					echo "<br><p style='color:green;'>TEST VALIDATION SUCCESS 2/3 VERIFIED</p><br>";
			   	}else 
			   	{
			   		echo "<br><p style='color:red;'>TEST VALIDATION ERROR 2/3 FAILS</p><br>";
			   	}
			   	if($result2->getPrice()===15) 
			   	{
					echo "<br><p style='color:green;'>TEST VALIDATION SUCCESS 3/3 VERIFIED</p><br>";
			   	}else 
			   	{
			   		echo "<br><p style='color:red;'>TEST VALIDATION ERROR 3/3 FAILS</p><br>";	   		
			   	}

			   	echo "<br><p style='color:blue'>TEST COMPLETED:</p><br>";	
			   	print_r($result2);
			   	echo "<br>";
			   	var_dump($result2);
			   	echo "<br><p style='color:blue'>[END] Done Testing!</p><br>";


	   		}
	   	}

   }
}


$firstTest = new TestCase1();
$firstTest->test()
?>