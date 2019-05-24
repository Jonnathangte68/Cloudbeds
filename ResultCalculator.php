<?php


require_once "JobFactoryClass.php";


class ResultCalculator 
{
	/* Agregation: The list of Jobs is passed to ResultCalculator on initilization. */
	private $jobList = array();

	protected function reLoopAndMerge($arrTemp) {
	    $tempInt = new Job(NULL, NULL, NULL);
            for ( $p = 0 ; $p < count($arrTemp); $p++) 
            { 

                if($p===0) 
                {
                	$tempInt->setStartDate($arrTemp[$p]->getStartDate()); 
                	$tempInt->setEndDate($arrTemp[$p]->getEndDate());
                	$tempInt->setPrice($arrTemp[$p]->getPrice());
                }

                if (($p+1) < count($arrTemp)) 
                {
                    if(($arrTemp[$p]->getEndDate() + 1) === $arrTemp[($p+1)]->getStartDate()) 
                    { 

                        $tempInt->setStartDate(($arrTemp[$p]->getStartDate() < $tempInt->getStartDate()) ? $arrTemp[$p]->getStartDate() : $tempInt->getStartDate());
                        $tempInt->setEndDate($arrTemp[($p+1)]->getEndDate());
                        $tempInt->setPrice($arrTemp[$p]->getPrice());

                    }   
                }
            }
	    return $tempInt;
	}

	public function addElement(Job $job) 
	{	
		array_push($this->jobList, $job);
	}

	public function getResult() {
		$ArregloI = $this->jobList;
		$ArregloR = array();
	    // Instance de Job Factory
	    $JobFactory = new JobFactory();
	    for($intervalo = 0 ; $intervalo < count($ArregloI) ; $intervalo++) 
	    {
	        if($intervalo===0) {
	            $arregloDeIntervalos = array();
	            array_push($arregloDeIntervalos, $ArregloI[$intervalo]);
	            array_push($ArregloR, $arregloDeIntervalos);
	            continue;
	        }
	        if(count($ArregloR) >= 1) 
	        {
	            $lastElmentOnArray = end($ArregloR);
	            $arr = array();
	            for($resultado = 0 ; $resultado < count($lastElmentOnArray) ; $resultado++ ) 
	            {
	                if($ArregloI[$intervalo]->getStartDate() < $lastElmentOnArray[$resultado]->getEndDate()) 
	                {
	                    if($lastElmentOnArray[$resultado]->getPrice() === $ArregloI[$intervalo]->getPrice()) 
	                    {
	                            $newJob = $JobFactory->createNewJob(
	                                $lastElmentOnArray[$resultado]->getStartDate(),
	                                $ArregloI[$intervalo]->getEndDate(),
	                                $lastElmentOnArray[$resultado]->getPrice()
	                            ); 
	                            if($lastElmentOnArray[$resultado]->getStartDate() < $ArregloI[$intervalo]->getEndDate()) 
	                            {
	                                array_push($arr, $newJob);
	                            }
	                        }
	                    else 
	                    {
	                        if(($ArregloI[$intervalo]->getStartDate()-1) >= $lastElmentOnArray[$resultado]->getStartDate()) 
	                        {
	                            $newJob = $JobFactory->createNewJob(
	                                $lastElmentOnArray[$resultado]->getStartDate(),
	                                $ArregloI[$intervalo]->getStartDate()-1,
	                                $lastElmentOnArray[$resultado]->getPrice()
	                            );
	                            array_push($arr, $newJob);
	                            array_push($arr, $ArregloI[$intervalo]);
	                        }
	                        if($lastElmentOnArray[$resultado]->getEndDate() > ($ArregloI[$intervalo]->getEndDate() + 1)) 
	                        {
	                            $newJob = $JobFactory->createNewJob(
	                                $ArregloI[$intervalo]->getEndDate()+1,
	                                $lastElmentOnArray[$resultado]->getEndDate(),
	                                $lastElmentOnArray[$resultado]->getPrice()
	                            );
	                            array_push($arr, $newJob);
	                        }
	                    }
	                } 
	                else 
	                {
	                    if($ArregloI[$intervalo]->getStartDate() > $lastElmentOnArray[$resultado]->getEndDate()) 
	                    {  
	                        if($ArregloI[$intervalo]->getPrice() === $lastElmentOnArray[$resultado]->getPrice()) 
	                        {
	                            if ($lastElmentOnArray[$resultado]->getEndDate()+1==$ArregloI[$intervalo]->getStartDate()) 
	                            {
	                                $new_Job = $JobFactory->createNewJob(
	                                    $lastElmentOnArray[$resultado]->getStartDate(), 
	                                    $ArregloI[$intervalo]->getEndDate(),
	                                    $lastElmentOnArray[$resultado]->getPrice()
	                                );
	                                array_push($arr, $new_Job);
	                            }
	                            else 
	                            {
	                                array_push($arr, $lastElmentOnArray[$resultado]);
	                                array_push($arr, $ArregloI[$intervalo]);
	                            }
	                        }else 
	                        { 
	                            array_push($arr, $lastElmentOnArray[$resultado]);            
	                        }
	                    }
	                    if( (($resultado+1) > count($lastElmentOnArray)) && !empty($arr)) 
	                    { 
	                        array_push($ArregloR, $arr);   
	                    }
	                } 
	        }
	        if (!empty($arr)) 
	        {
	            array_push($ArregloR, $arr);   
	        }else 
	        {
	            $arrTemp = array();
	            for($resultado = 0 ; $resultado < count($lastElmentOnArray) ; $resultado++ ) 
	            {
	                if (($ArregloI[$intervalo]->getStartDate() <= $lastElmentOnArray[$resultado]->getStartDate()) && $ArregloI[$intervalo]->getEndDate() <= $lastElmentOnArray[$resultado]->getEndDate()) 
	                {
	                    $new_Job = $JobFactory->createNewJob( 
	                        $lastElmentOnArray[$resultado]->getStartDate(), 
	                        $lastElmentOnArray[$resultado]->getEndDate(), 
	                        $ArregloI[$intervalo]->getPrice()
	                    );
	                    array_push($arrTemp, $new_Job);
	                }else 
	                {
	                    array_push($arrTemp, $lastElmentOnArray[$resultado]);
	                }
	            }
	            array_push($ArregloR, array($this->reLoopAndMerge($arrTemp)));
	        }
	        }
	    }
	    return $ArregloR;
	}

}


?>