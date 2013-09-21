<?php

class HomeView extends View{
		private $insps;
		private $result;
		private $pageData;
		protected function displayContent(){
		$this->insps = $this->model->getNewInsp();
		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";
		$html = '<div class="large-12 columns">';
		$html .= '<h2 id="header-title">'.$this-> pageInfo['pageHeading'].'</h2>'."\n";
	 $html .= '</div>';
			// $html .= '<p><img src="images/theBakery.jpg" />'.nl2br($this-> pageInfo['pageContent']).'</p>'."\n";
			
		$content = explode('<!---->', $this-> pageInfo['pageContent']);
		$html .= '<div class="large-8 columns">';
		$html .= $content[0];
		foreach ($this->insps as $insp) {
		$html .= '<p>&quot;';
	
			$html .= $insp['inspText']; 
	
		$html .= '&quot;</p>';
		}# end foreach
		$html .= '</div>';
		
		$html .= '<div class="large-4 columns">';
		$html .= $content[1];
		$html .= '</div>';

		if ($_POST['submit']) {
			// echo "<pre>";
			// print_r($_POST['inspiration']);
			// echo "</pre>";
			$this->pageData = $_POST;
			$this->result = $this->model->processAddInsp();
			

		}# end if

		if($this->model->adminLoggedIn){

			$html .= $this->displayForm();

		}#end if

$html .= '
	</div>
	</div>';


	return $html;

}# end displayContent


protected function displayForm(){

	// $html =  '<p><a href="index.php?page=editPage&amp;edit=home">Edit</a></p>'."\n";
	if(is_array($this->pageData)){
			extract($this->pageData);
	}
	
		if(is_array($this->result)){
		
		extract($this->result);
		
	}# end if
	$html = '<div class="row">
	<div class="large-12 columns">';
	
	$html .= '<div class="msg">'.$msg.'</div>';
	$html .= '<div class="msg">'.$inspMsg.'</div>';
	$html .= '<form id="form-inspiration" method="post" action="'.$_SERVER['REQUEST_URI'].'" data-abide>

	<fieldset>
	<legend>New Inspiration</legend>
	<div class="row">

	<div class="large-12 columns">
	<input type="hidden" name="userID" value="'.$_SESSION['userID'].'">
	<label>Insert new inspiration</label>
	<textarea name="inspiration" required>'.htmlentities(stripslashes($inspiration),  ENT_QUOTES) .'</textarea>
	<small class="error">A valid input is required.</small>
	</div>

	<div class="large-12 columns">
	<input class="small button" type="submit" name="submit" value="Submit">
	</div>

	</div>
	</fieldset>

	</form>';

	return $html;

}





}# end HomeView
?>