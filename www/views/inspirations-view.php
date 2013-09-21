<?php

class InspirationsView extends View{
		private $insps;
		protected function displayContent(){
		$this->insps = $this->model->getInsp();
		// echo count($this->insps);


		$html = '<div class="large-12 columns">';
		if ($this->model->adminLoggedIn) {

		$html .= '<h2 id="header-title">'.$this->pageInfo['pageHeading'].'</h2>'."\n";
	 $html .= '</div>';

		$html .= '<div class="large-12 columns">';
		
		foreach ($this->insps as $insp) {
		// $html .= '<p>&quot;';
			// $dateInsp = explode(" ", $insp['timeStamp']);
			$html .= '<div class="list-insp">';
			$html .= '<span class="timestamp">inserted at '.date("d F Y, h:i a", strtotime($insp['timeStamp'])).'</span>'.'<p>'.$insp['inspText'].'</p>'.'<div class="link-delete-parent"><a class="link-delete" href="index.php?page=delete&amp;did='.$insp['inspID'].'" onclick="return confirm(\'Are you sure?\');">Delete</a></div>'; 
			$html .= '</div>';
	
		// $html .= '&quot;</p>';
		}

		$html .= '</div>';
			
		}else{

			$html .= '<p>This page is restricted. <a href="index.php">Lost?</a></p>';
			
		}# end foreach

		

		$html .= '
	</div>
	</div>';


	return $html;

}# end displayContent



}# end HomeView
?>