<?php




/**
 * 
 */
class Formatter 
{
	
	public function formatOpColumn(String $start, String $end, String $price) {
		return "Add ({$start}-{$end}:{$price})";
	}

	public function format(array $arr) {
		$concat = "";
		foreach ($arr as $interval) {
			$concat .= (!empty($concat)) ? ", " : "";
			$concat .= "({$interval->getStartDate()}-{$interval->getEndDate()}:{$interval->getPrice()})";
		}
		return "[".$concat."]";
	}


}





?>