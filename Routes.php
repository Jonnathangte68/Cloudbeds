<?php


/* Name: Routes 
   Description: Application endpoints... 
   Author: Jonnathan Guarate
   Date: 21/05/2019
*/

if (isset($_GET['get_all_jobs'])) 
{
	echo json_encode($taskManager->get());
	//echo json_encode(array_values($taskManager->get()));
	exit;
}

if (isset($_POST) && isset($_POST['clearDB'])) 
{
	$taskManager->delete();
}

if (isset($_POST) && isset($_REQUEST['add_new_job'])) 
{
	print_r($taskManager->post($_REQUEST['start_date'], $_REQUEST['end_date'], $_REQUEST['price']));
}

/* [End] Routes */
?>