<?php
# This script acts as the "Controller" and loads the page to be display
session_start();

include 'views/view-class.php';
include 'classes/model-class.php';

class PageSelector{

	public function run(){

		if (!$_GET['page']) { // if page is not available
			
				$_GET['page'] = 'home'; // set it to home

		}# end if

		$model = new Model; // instantiate the Dbase class
		
		if($_GET['page'] == 'editPage'){
			
				$pageInfo = $model->getPageInfo($_GET['edit']); // read the content from edit url in the home page
			
			}else{
					
					$pageInfo = $model->getPageInfo($_GET['page']); // read the content from the pages table
				
		}# end if
		
		// echo "<pre>";
		// print_r($pageInfo);
		// echo "</pre>";

		switch ($_GET['page']){

			case 'home':
			include 'views/home-view.php';
			$view = new HomeView($pageInfo, $model);

			break;	

			case 'inspirations':
			include 'views/inspirations-view.php';
			$view = new InspirationsView($pageInfo, $model);

			break;

			case 'contact':
			include 'views/contact-view.php';
			$view = new ContactView($pageInfo, $model);

			break;

			case 'delete':
			include 'views/delete-view.php';
			$view = new DeleteView($pageInfo, $model);

			break;

			case 'logout':
			case 'admin':
			include 'views/admin-view.php';
			$view = new AdminView($pageInfo, $model);

			break;
			
			default:
			
			include 'views/404View.php';
			$view = new PnfView($pageInfo, $model);

		}# end switch

		echo $view-> displayPage();

	}# end run
}# end PageSelector

$pageSelect = new PageSelector;
$pageSelect-> run();


?>