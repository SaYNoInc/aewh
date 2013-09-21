<?php

class AboutView extends View{

	protected function displayContent(){
		
		$html = 'this is '.$this-> pageInfo['pageHeading'].'';

		return $html;

	}# end displayContent

}# end AboutView

?>