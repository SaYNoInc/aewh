<?php
// this class contains the method to display the page to allow admin to add another product
 
class addProductView extends View{

	protected function displayContent(){

		$html = '<h2>'.$this-> pageInfo['pageHeading'].'</h2>'."\n";

		// check if admin user is not logged and if so, restrict access
			if (!$this->model->adminLoggedIn) {
			$html .= '<p>Sorry, but this is a restricted page</p>'."\n";
			return $html;
		}

	 // check if the product form has been submitted
	 if ($_POST['Add']) {
	 echo "<pre>";
	 print_r($result);
	 print_r($_FILES);
	 echo "</pre>";
		 $result = $this-> model-> proccessAddProduct();
	 	// if productImage has been returned with the result array
	 	// store it in $_POST so it can be displayed on the form
	 	if ($result['productImage']) {
	 	 	
	 	 $_POST['productImage'] = $result['productImage'];

	 	}# end if 

	 }# end if

	 $html .= $this-> displayProductForm('Add', $result, $_POST);

		return $html;
	}# end displayContent

	protected function displayProductForm($mode, $result, $product){
		
		if (is_array($result)) {

			extract($result);
		
		}# end if

		extract($product);
		
		$html .='<form id="edit_form" method="post" action="'.
			htmlentities($_SERVER['REQUEST_URI']).'" enctype="multipart/form-data">'."\n";
		$html.='<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />'."\n";								//   the following 2 hidden fields are used for edit product
		$html.='<input type="hidden" name="productID" value="'.$productID.'" />'."\n";
		$html.='<input type="hidden" name="productImage" value="'.$productImage.'" />'."\n";
		$html.= '<label for="productName">Product Name </label>'."\n";;
		$html.= '<input type = "text" name="productName" id = "productName" '.
				'value="'.htmlentities(stripslashes($productName),ENT_QUOTES).'" />'."\n";
		$html .= '<div id="pNameMsg" class="error"> '.$pNameMsg.'</div>'."\n";		
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="productDescription">Description </label>'."\n";
		$html.= '<input type="text" name="productDescription" id="productDescription"   value="'.
				htmlentities(stripslashes($productDescription),ENT_QUOTES).'" />'."\n";
		$html .= '<div id="pdescMsg" class="error"> '.$pDescMsg.'</div>'."\n";
		$html.= '<div class="clear"></div>'."\n";
		$html.= '<label for="productPrice">Price</label>'."\n";
		$html.= '<input type = "text" name="productPrice" id = "productPrice"   value="'.
				$productPrice.'" />'."\n";
		$html .= '<div id="price_msg" class="error"> '.$pPriceMsg.'</div>'."\n";
		$html .= '<div class="clear"></div>'."\n";
		$html .= '<div><label for="productImage">Upload New Image</label><br />'."\n";
		$html .= '<input type="file" name="productImage" /></div>'."\n";
		$pImageMsg = $uploadMsg ? $uploadMsg : $pImageMsg;
		$html .= '<div class="error"> '.$pImageMsg.'</div>'."\n";
		$html .= '<div class="clear"></div>'."\n";
		
		// check if the image is available. Display it.
		if ($productImage) {

			$html .= '<div>'."\n";
			$html .= '<img src="uploads/thumbnails/'.$productImage.'"/>';
			$html .= '</div>'."\n";

		}else{

			$html .= '<div>&nbsp;</div>'."\n";

		}# end if

		$html .= '<div><input type = "submit" name="'.$mode.'" value="'.$mode.'"  /></div>'."\n";
		$html .= '<div class="clear"></div>'."\n";
		$html .= '</form>'."\n";
	               // end of div editform
		$html .= '<div>'.$msg.'</div>';
		return $html;

	}# end displayProductForm









}# end addProductView
?>