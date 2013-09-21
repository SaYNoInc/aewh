<?php
class editPageView extends View{
	private $pageData;
	private $result;  // holds the error messages as a result of form validation
	
	protected function displayContent(){
			
		$html = '<h2>Edit Page</h2>'."\n";
			
			if(!$this-> model-> adminLoggedIn){
				
					$html .=  '<p>this page is restricted</p>'."\n";
					return $html;
					
				}#end if
			
			if($_POST['submit']){
				
					$this-> pageData = $_POST;
					$this-> result = $this-> model-> processEditPage();
										 
				}# end if
			
		$this-> pageData = $this->pageInfo;		
		$html .= $this-> displayEditPageForm();	
			return $html;
			
	}# displayContent
		
		private function displayEditPageForm(){

				extract($this-> pageData);
				
				if(is_array($this-> result)){
					
						extract($this-> result);
					
					}# end if
					
				$html = '<form method="post" action="' .  htmlentities( $_SERVER['REQUEST_URI'] ) . '">'."\n";
				
				$html .= '<label for="pageName">Page Name</label>'."\n";
				$html .= '<input type="text" name="pageName" id="pageName" value="'.$pageName.'"  readonly="readonly"/>';
				$html .= '<div class="clear"></div>'."\n";
				$html .= '<label for="pageTitle">Page Title</label>'."\n";
				$html .= '<input type="text" name="pageTitle" id="pageTitle" value="' . htmlentities(stripslashes($pageTitle),  ENT_QUOTES) .'" />';
				$html .= '<div class="error">'. $pTitleMsg .'</div>';
				$html .= '<div class="clear"></div>'."\n";
				
				$html .= '<label for="pageHeading">Page Heading</label>'."\n";
				$html .= '<input type="text" name="pageHeading" id="pageHeading" value="' . htmlentities(stripslashes($pageHeading),  ENT_QUOTES) .'" />';
				$html .= '<div class="error">'. $pHeadingMsg .'</div>';
				$html .= '<div class="clear"></div>'."\n";
				
					$html .= '<label for="pageKeywords">Page Keywords</label>'."\n";
				$html .= '<input type="text" name="pageKeywords" id="pageKeywords" value="' . htmlentities(stripslashes($pageKeywords),  ENT_QUOTES) .'" />';
				$html .= '<div class="error">'. $pKeywordsMsg .'</div>';
				$html .= '<div class="clear"></div>'."\n";
				
					$html .= '<label for="pageDescription">Page Description</label>'."\n";
				$html .= '<input type="text" name="pageDescription" id="pageDescription" value="' . htmlentities(stripslashes($pageDescription),  ENT_QUOTES) .'" />';
				$html .= '<div class="error">'. $pDescriptionMsg .'</div>';
				$html .= '<div class="clear"></div>'."\n";
				
					$html .= '<label for="pageContent">Page Content</label>'."\n";
				$html .= '<textarea name="pageContent" id="pageContent" >' . htmlentities(stripslashes($pageContent),  ENT_QUOTES) .'</textarea>';
				$html .= '<div class="error">'. $pContentMsg .'</div>';
				$html .= '<div class="clear"></div>'."\n";
				
				$html .= '<input type="submit" class="submitButton" name="submit" value="Submit">';
				$html .= '<div class="clear"></div>'."\n";
				
				$html .= '</form>';
				$html .= '<div>'.$this->result['msg'].'</div>'."\n";
				return $html;
			
			}# displayEditPageForm
		
		
		
		
		
		
		
		
		
		
		
		
		
		
}# ends editPageView 
?>