<?php
class AdminView extends View{

	protected function displayContent(){

		$html = '';
		$html .= '<div class="large-6 columns">';
		// chcek if admin is logged in
		if ($this->model->adminLoggedIn) {

			$html .= '<p>Actions:</p>'."\n";
			$html .= '<ul>'."\n";
			$html .= '<li><a href="index.php?page=inspirations">View Inspirations</a></li>'."\n";
			$html .= '</ul>'."\n";

		}else{

		$html .= $this-> displayLoginForm();
		$html .= '<p class="error">'.$this->model->loginMsg.'</p>'."\n";

		}# end if

		$html .= '</div>';
		return $html;

	}# end displayContent

	private function displayLoginForm(){
		$html .= '<form method="post" action="'.htmlentities($_SERVER['REQUEST_URI']).'" >'."\n";
		$html .= '<label for="userName">Username</label> '."\n";
		$html .= '<input type="text" name="userName" id="userName" /> '."\n";
		$html .= '<div id="clear"></div>';

		$html .= '<label for="userPassword">Password</label> '."\n";
		$html .= '<input type="password" name="userPassword" id="userPassword" /> '."\n";

		$html .= '<div id="clear"></div>';

		$html .= '<input class="small button" type="submit" name="login" value="Login" /> '."\n";
		$html .= '</form>'."\n";

		return $html;

	}# end displayLoginForm

}# end AdminView

?>