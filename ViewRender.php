<?php 

class ViewRender {

	/* Void: Renders the view */
	public function renderHTML() 
	{
		$viewTemplate = file_get_contents('view_file.html');
		echo $viewTemplate;
	}
}



?>