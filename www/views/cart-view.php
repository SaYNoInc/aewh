<?php

class CartView extends View{
	// holds info about each product in the cart
	private $cartContents;

	protected function displayContent(){

		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";
		$html = '<h2>'.$this-> pageInfo['pageHeading'].'</h2>'."\n";
		$this-> cartContents = $this-> cartObj-> getCartContents();

		if (is_array($this-> cartContents)) {
			
			$html .= $this-> displayCartContents();

		}else{

			$html .= '<p>Your cart is empty</p>'."\n";

		}# end if

		$html .= '<p id="shopLink"><a href="index.php?page=products">Continue shoppping</a>'."\n";
		$html .= '| <a href="index.php?page=checkout">Checkout</a></p>'."\n";
		return $html;

	}# end displayContents

private function displayCartContents(){

		$html = '';
			
		foreach ($this-> cartContents as $product) {
		
			$html .= '<div class="cartProduct"><a href="index.php?page=singleProduct&amp;pid='.$product['productID'].'">';
			$html .= '<img src="uploads/thumbnails/'.$product['productImage'].'" alt="'.$product['productName'].'" /> </a>'."\n";
			$html .= '<h3><a href="index.php?page=singleProduct&amp;pid='.$product['productID'].'">'.$product['productName'].'</a></h3>'."\n";
			$html .= '<p>'.$product['productPrice'].'</p>'."\n";
			// $html .= '<div class="clear"></div>'."\n";

			// form to update and delete item(s)
			$html .= '<form class="cartForm" method="post" action="'.$_SERVER['REQUEST_URI'].'">'."\n";
			$html .= '<p><label for="quantity">Quantity</label>'."\n";
			$html .= '<select id="quantity" name="quantity">';
			
			for ($i=1; $i <= 20 ; $i++) { 
				$html .= '<option value="'.$i.'"';
				$html .= ($i == $product['quantity']) ? 'selected="selected"' : '';
				$html .= '>'.$i.'</option>'."\n";
			}# end for

			$html .= '</select>'."\n";
			$html .= '<input type="hidden" name="productID" value="'.$product['productID'].'" />'."\n";
			$html .= '<input type="submit" name="updateCart" value="Update" />'."\n";
			$html .= '<input type="submit" name="deleteCart" value="Delete" />'."\n";
			$html .= '</form>';

			$html .= '</div>'."\n";

		}# end foreach

		return $html;

}# end displayCartContents








}# end CartView
?>