<?php
include 'classes/select-class.php';
class CheckoutView extends View{
private $result; // contains the error messages as a result of validating the checkout form
	protected function displayContent(){

		$html = '<h2>'.$this-> pageInfo['pageHeading'].'</h2>'."\n";
		
		if ($_GET['receipt']) {
			$html .= '<p>Transaction completed with receipt number '.$_GET['receipt'].'</p>';
		return $html;
		}# end if
		if ($_SESSION['cart']) {
			
			$total = $this-> cartObj-> getTotalAmount();
			$html .= '<h3>Your order total is $ '. sprintf('%.2f',$total) .'</h3>';
			// has the checkout has been submitted?
			if ($_POST['process']) {
			
				$this-> result = $this-> model-> validateCheckOut();
				if ($this-> result['ok']) { // if checkout has no errors
					
					$receipt = $this-> cartObj-> processOrder();
					header("location: index.php?page=checkout&receipt=".$receipt);

				}# end if

			}# end if
			
			$html .= $this-> showCheckoutForm();

		}else{

			$html .='<p>Sorry your cart is empty, nothing to process.</p>';

		}# end if

		return $html;
	}# end displayContent

private function showCheckoutForm(){  

	if (is_array($this-> result)) {
		extract($this-> result);
	}# end if


	if ($_POST['process']) {
		extract($_POST);
	}# end if

		$select = new Select;
		$countries = $select-> fillCountryOptions();

		$html = '<form id="checkout" method="post" action="'.htmlentities($_SERVER['REQUEST_URI']).'">'."\n";
		$html.= '<label for="name" >Name</label>';
		$html.= '<input type = "text" name="name" id = "name" value="'.htmlentities(stripslashes($name), ENT_QUOTES).'" />'."\n";
		$html.= '<div class="error">'.$nameMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="email" >Email </label>'."\n";
		$html.= '<input type = "text" name="email" id="email"  value="'.htmlentities(stripslashes($email), ENT_QUOTES).'"/>'."\n";
		$html.= '<div class="error"> '.$emailMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="phone" >Phone </label>'."\n";
		$html.= '<input type="text" name="phone" id="phone"  value="'.htmlentities(stripslashes($phone), ENT_QUOTES).'"/>'."\n";
		$html.= '<div class="error"> '.$phoneMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="hno_street">H.No, Street</label>'."\n";
		$html.= '<textarea name="hnoStreet" id="hnoStreet" rows="2" cols="20" >'.htmlentities(stripslashes($hnoStreet), ENT_QUOTES).'</textarea>'."\n";
		$html.= '<div class="error"> '.$streetMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="suburb">Suburb</label>'."\n";
		$html.= '<input type="text" name="suburb" id="suburb"   value="'.htmlentities(stripslashes($suburb), ENT_QUOTES).'"/>'."\n";
		$html.= '<div class="error"> '.$suburbMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="city">City / Town</label>'."\n";
		$html.= '<input type="text" name="city" id="city"  value="'.htmlentities(stripslashes($city), ENT_QUOTES).'"/>'."\n";
		$html.= '<div class="error"> '.$cityMsg.'</div>'."\n";
		$html .= '<label for="country">Country</label>'."\n";

		$country = ($country == '') ? 'New Zealand' : $country;
		$html .= $select-> createSelect('country', $countries, $country);
		$html.= '<div class="clear"></div>'."\n";

		$html .= '<p class="col1a">Shipping Address: [If different from above]</p>'."\n";
		$html.= '<label for="shipHnoStreet">H.No, Street</label>'."\n";
		$html.= '<textarea name="shipHnoStreet"  id="shipHnoStreet" rows="2" cols="20" >'.htmlentities(stripslashes($shipHnoStreet), ENT_QUOTES).'</textarea>'."\n";
		$html.= '<div class="error"> '.$streetMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="ship_suburb" >Suburb</label>'."\n";
		$html.= '<input type="text" name="shipSuburb" id="ship_suburb"  value="'.htmlentities(stripslashes($shipSuburb), ENT_QUOTES).'" />'."\n";
		$html.= '<div class="error"> '.$suburbMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="shipCity">City / Town</label>'."\n";
		$html.= '<input type="text" name="shipCity" id="shipCity"  value="'.htmlentities(stripslashes($shipCity), ENT_QUOTES).'"/>'."\n";
		$html.= '<div class="error"> '.$cityMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";

		$html .= '<label for="country">Ship Country</label>'."\n";
		
		$shipCountry = ($shipCountry == '') ? 'New Zealand' : $shipCountry;
		$html .= $select-> createSelect('shipCountry', $countries, $shipCountry);
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<input type = "submit" name="process" value="Submit" />'."\n";
		$html .= '</form>'."\n";
		$html .= '<p id="shopLink"><a href="index.php?page=products">Continue Shopping</a></p>'."\n";
		return $html;
	}# end checkoutForm


}# end CheckoutView
?>