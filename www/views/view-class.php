<?php
# when the function is not ready yet, it has to be abstract.

abstract class View {

	protected $pageInfo; # holds the data read from the pages table
	protected $model; # holds the object for the db class
	protected $cartObj; # hold the object for the cart class

	public function __construct($info, $model) {

		$this->pageInfo = $info;
		$this->model   = $model;

	}# end __construct

	private function displayHeader() {

		$html  = '<!DOCTYPE html>'."\n";
		$html .= '<html>'."\n";
		$html .= '<head>'."\n";
		$html .= '<meta charset="utf-8" />'."\n";
		$html .= '<title>'.$this->pageInfo['pageTitle'].'</title>'."\n";
		$html .= '<meta name="description" content="'.$this->pageInfo['pageDescription'].'" />'."\n";
		$html .= '<meta name="keyword" content="'.$this->pageInfo['pageKeywords'].'" />'."\n";
		$html .= '<link rel="stylesheet" href="css/app.css">'."\n";
  $html .= '<link rel="stylesheet" href="css/main.css">'."\n";
	 $html .= '<link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">'."\n";
	 $html .= '<script src="js/vendor/custom.modernizr.js"></script>'."\n";
		$html .= '</head>'."\n";
		$html .= '<body>'."\n";
		// $html .= '<div id="header">'."\n". '<div class="container">'."\n";
		// $html .= '<h1><a id="home" href="index.php"><span id="the">The</span>Bakery</a></h1>'."\n";
		// $html .= '<p id="small-cart">'."\n";
		$html .= '<div class="row">
	<div class="large-12 columns">
		<img src="images/sunset1.png">
	</div>
</div>';


		// if ($_SESSION['cart'] || $_GET['page'] == 'singleProduct') {
			
		// 	$this-> cartObj = new Cart($this-> model);
		// 	$html .= $this-> cartObj-> cartSummary; 

		// }else{

		// 	$html .= 'Your cart is empty.';

		// }# end if

$html .= '<div class="row navigation-area">
<div class="large-12 columns">
<div class="contain-to-grid">
<nav class="top-bar">
<section class="top-bar-section">';
$html .= $this->displayNav();
$html .= '	
</section>
</nav>

</div>
</div>
</div><!-- END HEADER  -->';
	$html .= '	<div class="row">';


		// $html .= '</p>'."\n";
		// $html .= '</div>'."\t\t".'<!--end of container-->'."\n";
		// $html .= $this-> displayLoginInfo();
		// $html .= '</div>'."\t\t".'<!--end of header-->'."\n";
		// $html .= '<div class="container">'."\n";
		// $html .= $this-> displayNav();
		// $html .= '<div id="content">'."\n";

		return $html;
	}# end displayHeader

# when the function is not ready yet, it has to be abstract.
	abstract protected function displayContent();

	private function displayLoginInfo(){

		if ($this->model->adminLoggedIn) {
			$html = '<p id="loginInfo">You are logged in as '.$_SESSION['userName'].'</p>'."\n";
			return $html;
		}# end if

	}# end displayLoginInfo

	private function displayNav(){

	
		$html = '<ul class="right">
		<li class="toggle-topbar"><a href="#"><span>Menu</span></a></li>
		<li class="divider"></li>
		<li><a href="index.php?page=home">home</a></li>
		<li class="divider"></li>
		<li><a href="about.php">about</a></li>
		<li class="divider"></li>
		<li class="has-dropdown"><a href="#">shopping</a>
			<ul class="dropdown"><li><a href="shopping.php">The book</a></li></ul>
		</li>
		<li class="divider"></li>
		<li><a href="index.php?page=contact">contact</a></li>
		<li class="divider"></li>
		</ul>';
	
		return $html;

		// $html = '<ul id="navigation">'."\n";

		// foreach ($links as $link) {
			
		// 	$html .= '<li><a href="index.php?page='.$link.'"';
		// 	$html .= ($this-> pageInfo['pageName'] == $link) ? 'class="active"' : ''; 
		// 	$html .= '>'.$link.'</a></li>'."\n";

		// }# end foreach

		// $html .= '</ul>'."\n";
	
		// return $html;

	}# end displayNav

	private function displayFooter() {

		// $html = '</div>'."\t\t";
		$html = '</div>'."\t\t";
		$html .= '<div class="row">';
		$html .= '<div class="large-12 columns">';
		$html .= '<div id="footer"><p>&copy;2013 An Encounter With Hope &sdot; ';
		// check if admin is login
		if ($this->model->adminLoggedIn) {

			$html .= $this-> displayLoginInfo();
			$html .= '<a href="index.php?page=admin">Admin Panel</a> | ';
			$html .= '<a href="index.php?page=logout">Logout</a> ';
			
		}else{

		$html .= '<a href="index.php?page=admin">Login</a>';
			
		}# end if
		
		$html .= ' <span id="jerseyscript">Website by <a href="http://jerseyscript.com">Seno Amarto S</a></span></p>'."\n";	
		$html .= '</div>'."\t\t";
		$html .= '</div>';
		$html .= '</div>';

		$html .= '<script>
  document.write(\'<script src=\' +
  (\'__proto__\' in {} ? \'js/vendor/zepto\' : \'js/vendor/jquery\') +
  \'.js><\/script>\')
  </script>
  
 <script src="js/foundation/foundation.js"></script>
	
	<script src="js/foundation/foundation.abide.js"></script>
	
	<script src="js/foundation/foundation.alerts.js"></script>
	
	<script src="js/foundation/foundation.clearing.js"></script>
	
 <script src="js/foundation/foundation.cookie.js"></script>
	
 <script src="js/foundation/foundation.dropdown.js"></script>
	
 <script src="js/foundation/foundation.forms.js"></script>
	
 <script src="js/foundation/foundation.interchange.js"></script>
	
 <script src="js/foundation/foundation.joyride.js"></script>
	
 <script src="js/foundation/foundation.magellan.js"></script>
	
 <script src="js/foundation/foundation.orbit.js"></script>
	
 <script src="js/foundation/foundation.placeholder.js"></script>
	
 <script src="js/foundation/foundation.reveal.js"></script>
	
 <script src="js/foundation/foundation.section.js"></script>
	
 <script src="js/foundation/foundation.tooltips.js"></script>
	
 <script src="js/foundation/foundation.topbar.js"></script> 
	
  
  <script>
    $(document).foundation()
    .foundation(\'abide\',{

    	live_validate : true,
			  focus_on_invalid : true,
			  timeout : 1000,
	    patterns: {
	      alpha_numeric : /[a-zA-Z0-9]+/
	    }
	  
	  });
  </script>

  <script>

					$(\'#form-inspiration\')
						.on(\'invalid\', function () {

							var invalid_fields = $(this).find(\'[data-invalid]\');
							console.log(invalid_fields);
						
						});

							$(\'#form-inspiration\')
						.on(\'valid\', function () {
						console.log(\'valid!\');
					});

	 </script>';

		$html .= '</body>'."\n";
		$html .= '</html>';

		return $html;
	}# end displayFooter

	public function displayPage() {

		$this->model->checkUserSession();

		$html  = $this->displayHeader();

		$html .= $this->displayContent();

		$html .= $this->displayFooter();

		return $html;
	}# end displayPage

}# end View


?>