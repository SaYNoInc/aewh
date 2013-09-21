<?php

	class SingleProductView extends View{

		private $product;

		protected function displayContent(){

			$this-> product = $this-> model -> getProductByID($_GET['pid']);
			// echo "<pre>";
			// print_r($this-> product);
			// echo "</pre>";

			// return $html;

				if (is_array($this-> product)) {

				$html .= $this-> displayProduct($this-> product);
			
			}else{

				$html .= '<p>Sorry, the product is not available</p>';

			}# end if

			return $html;

		}# end displayContent


		private function displayProduct($product){
			
			$html = '';
			// foreach ($this-> products as $product) {
			$html .= '<div id="product">';
			$html .= '<img src="uploads/images/'.$this-> product['productImage'].'" />';
			$html .= '<h3>'.$product['productName'].'</h3>'."\n";
			$html .= '<p>'.$this-> product['productDescription'].'</p>'."\n";
			$html .= '<p>Price : '.$this-> product['productPrice'].'</p>'; 
			if ($this-> cartObj-> inCart($product['productID'])) {
			
				$html .= '<p>This product has been added to cart. <a href="index.php?page=cart">View Cart</a></p>';
			
			}else{
				
			$html .= $this-> displayCart($product);
			
			}# end if
			$html .= '</div>'."\n";

			// }# end foreach

			return $html;
		}# end displayProducts

		private function displayCart($product){

			$html = '<form id="addToCartForm" method="post" action="'.$_SERVER['REQUEST_URI'].'">'."\n";

			$html .= '<label for="quantity">Quantity</label>'."\n";
			$html .= '<select id="quantity" name="quantity">';
			
			for ($i=1; $i <= 20 ; $i++) { 
				$html .= '<option value='.$i.'>'.$i.'</option>'."\n";
			}# end for

			$html .= '</select>'."\n";
			$html .= '<input type="hidden" name="productID" value="'.$product['productID'].'" />'."\n";
			$html .= '<input type="hidden" name="price" value="'.$product['productPrice'].'" />'."\n";
			$html .= '<input type="submit" name="addToCart" value="Add" />'."\n";

			$html .= '</form>';
			return $html;

		}# end displayCart


	}# end HomeView
?>