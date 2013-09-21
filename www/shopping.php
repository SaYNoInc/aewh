<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>An Encounter with hope</title>

  
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
  

  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>

<div class="row">
	<div class="large-12 columns">
		<img src="images/sunset1.png">
		<img id="inset" src="images/inset.jpg">
	</div>
</div>
<div class="row">
<div class="large-12 columns">
<div class="contain-to-grid">
<nav class="top-bar">
<section class="top-bar-section">
	<ul class="right">
		<li class="toggle-topbar"><a href="#"><span>Menu</span></a></li>
		<li class="divider"></li>
		<li><a href="index.php">home</a></li>
		<li class="divider"></li>
		<li><a href="about.php">about</a></li>
		<li class="divider"></li>
		<li class="has-dropdown"><a href="#">shopping</a>
			<ul class="dropdown"><li><a href="shopping.php">The book</a></li></ul>
		</li>
		<li class="divider"></li>
		<li><a href="<?php echo 'index.php?page=contact'; ?>">contact</a></li>
		<li class="divider"></li>
	</ul>
</section>
</nav>

</div>
</div>
</div>
<!-- END HEADER  -->
<div class="row">
<div class="large-12 columns">
<h2 id="header-title"><?php echo "An Encounter With Hope";?></h2>
</div>
<div class="large-8 columns">
<h3>This is a title of the book</h3>
<img id="author-avatar" src="images/dummy-avatar.png">
<p>Description of the book goes here. consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>
	<div class="row">
	<div class="large-12 columns">
<div id="footer"><p>&copy;<?php echo date("Y"); ?> An Encounter With Hope &sdot;
</div>
</div>
</div>
<?php /*
<div class="large-4 columns">
<h3>This is a title of the book</h3>
<img id="author-avatar" src="images/dummy-avatar.png">
<!-- ADD TO CART button code. -->
<form action="https://www.e-junkie.com/ecom/fgb.php?c=cart&cl=1&ejc=2" target="ej_ejc" method="POST">

<!-- paypal email(remove if not using PayPal) -->
<input type="hidden" name="business" value="your_paypal_email"/>

<!-- google merchant id (remove if not using Google Checkout) -->
<input type="hidden" name="merchant_id" value="your_google_merchant_id"/>
<!-- site url -->
<input type="hidden" name="site_url" value="http://yoursite.com"/>

<!-- contact email (where we can notify of the updates) -->
<input type="hidden" name="contact_email" value="your@email.address"/>

<!-- item name -->
<input type="hidden" name="item_name" value="The Book title"/>
<!-- item number (should be different for each product)-->
<input type="hidden" name="item_number" value="1"/>
<!-- item price -->
<input type="hidden" name="amount" value="25.00"/>

<!-- initial quantity -->
<input type="hidden" name="quantity" value="1"/>

<!-- item options (can be removed if not required) -->
<!-- <input type="hidden" name="on0" value="Size"/>
<select name="os0" > -->
<!-- <option value="S">S</option> -->
<!-- <option value="The Book title">This the title of the book</option>
</select> -->
<!-- <input type="hidden" name="on1" value="Color"/>
<select name="os1" >
<option value="Orng">Orng</option><option value="Blk">Blk</option>
</select> -->
<!-- <input type="hidden" name="on2" value="Message"/>
<input name="os2" type="text" value="this is optional message"/> -->

<!-- shipping cost -->
<input type="hidden" name="shipping" value="1">

<!-- shipping cost of each additional unit --> 
<input type="hidden" name="shipping2" value="0.5">
<!--handling cost --> 
<input type="hidden" name="handling" value="0.5">

<!-- tax (flat amount, NOT percentage)-->
<input type="hidden" name="tax" value="0.50"/>

<!-- following options are applicable to whole cart-->

<!-- you thank you page -->
<input type="hidden" name="return_url" value="http://www.e-junkie.com/"/>

<!-- any custom info you want to pass for the whole order -->
<input type="hidden" name="custom" value="anything"/>

<!-- currency (USD for Google Checkout USA, GBP for Google Checkout UK. For PayPal: any currency that PayPal supports -->
<input type="hidden" name="currency_code" value="USD"/>

<input type="image" src="https://www.e-junkie.com/ej/ej_add_to_cart.gif" border="0" onClick="javascript:return EJEJC_lc(this.parentNode);">
</form> 

<!-- VIEW CART button code. --> 
<a href="https://www.e-junkie.com/ecom/fgb.php?c=cart&cl=1&ejc=2&
merchant_id=your_google_merchant_id&business=your_paypal_email" target="ej_ejc" class="ec_ejc_thkbx" onClick="javascript:return EJEJC_lc(this);"><img src="https://www.e-junkie.com/ej/ej_view_cart.gif" border="0"></a>
</div>
</div>



<script>
<!-- 
function EJEJC_lc(th) { return false; }
// -->
</script>
*/ ?>
<script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
	<script src="js/box.js"></script>
  
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

	 
</body>
</html>
