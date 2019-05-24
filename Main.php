<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	/*Default autoload */
	require_once 'TaskManager.php';
	require_once 'ViewRender.php';
	$taskManager = new TaskManager();
	$viewRender = new ViewRender();
	require_once 'Routes.php';

	/* [END] autoload */

	/* Load GUI */
	$viewRender->renderHTML();
?>