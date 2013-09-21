<?php

class ContactView extends View{
	private $insps;
	protected function displayContent(){
	
	$html .= '<div class="large-8 columns">';	
	$html .= '<h1>Contact Me</h1>';

	if($_POST['contact']) {
		$result = $this->processForm();
		
		if(is_array($result)) {
			
			$html .= '<ul>';
			foreach($result as $error) {
				$html .= '<li>'.$error.'</li>';
			}
			$html .= '</ul>';
			
			$html .= $this->displayForm();
		} else {
			$html .= '<p>'.$result.'</p>';
		}
		
	} else {
		$html .= $this->displayForm();
	}

	$html .= '</div>';
	return $html;
}# end displayContent

	function displayForm() {
	
	$html = '<form id="contact-form" method="post" action="'.$_SERVER['REQUEST_URI'].'">';
	
	$html .= '<div>';
	$html .= '<label for="name">Name:</label><br />';
	$html .= '<input type="text" name="name" id="name" value="'.$_POST['name'].'" />';
	$html .= '</div>';
	
	$html .= '<div>';
	$html .= '<label for="email">Email:</label><br />';
	$html .= '<input type="text" name="email" id="email" value="'.$_POST['email'].'" />';
	$html .= '</div>';
	
	$html .= '<div>';
	$html .= '<label for="message">Message:</label><br />';
	$html .= '<textarea id="message" name="message">'.$_POST['message'].'</textarea>';
	$html .= '</div>';
	
	$html .= '<input type="submit" name="contact" value="Contact Us" />';
	
	$html .= '</form>';
	
	return $html;
	
}

function processForm() {
	
	$errors = array();
	
	if(strlen($_POST['name']) < 2) {
		$errors[] = 'Your name needs to be at least 2 characters long';
	} 
	
	if(!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9_\-\.]+\.[a-zA-Z0-9_\-]+$/',$_POST['email'])){
		$errors[] = "Invalid email address has been entered!";	
	}
	
	if(strlen($_POST['message']) < 10) {
		$errors[] = "Your name needs to be at least 10 characters";
	}
	
	if(empty($errors)) {
		return $this->sendMail();
	} else {
		return $errors;
	}	
}


function sendMail() {
	
	extract($_POST);
	
	$to = 'borlandseno@yahoo.com';
	$subject = 'Message from your website: ';
	
	$body = 'Someone is enquirying through the contact form.'."<br />\r\n";
	$body .= '<strong>Name:</strong>'.$name."<br />\r\n";
	$body .= '<strong>Email:</strong>'.$email."<br />\r\n";
	$body .= '<strong>Message:</strong>'."<br />\r\n";
	$body .= stripslashes(strip_tags($message));
		
	$headers = 'From: '.$name.' <'.$email.'> '. "\r\n" .
              'Reply-To: '.$email. "\r\n" .                    
			  //this is used to set the email that it will reply to 
              'MIME-Version: 1.0'. "\r\n" .
              'Content-type: text/html; charset=UTF-8'. "\r\n". 
			  //so that I can send html in my emails
              'X-Mailer: PHP/'.phpversion();                    
			  //this is used to determine what sent the email
	
	$sent = mail($to, $subject, $body, $headers);
	
	if($sent) {
		return 'The email has been successfully send. I shall contact you ASAP.';
	} else {
		return 'Sorry, an error has occurred. Please try again later.';
	}

}




}# end HomeView
?>