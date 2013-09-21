<?php
/*
**	This class contains the method to display the page to allow admin
**	to delete the product from the products table, together  with the
**  images based on the product id given on the url.
*/

class deleteProductView extends View{
	
	private $msg;				//	holds the message for the delete process

	protected function displayContent(){
		
		$html = '<h2>'.$this->pageInfo['pageHeading'].'</h2>'."\n";
						//	check if admin user is not logged and if so, restrict access
		
		if (!$this->model->adminLoggedIn) {
		
			$html .= '<p>Sorry, but this is a restricted page</p>'."\n";
			return $html;
		
		}# end if
		
						//	check if any of the form buttons have been clicked
		if ($_POST['confirm']) {	//	if deletion is confirmed
		
			$result = $this->model->processDeleteProduct();	
			$html .= '<p>'.$result['msg'].'</p>'."\n";
			return $html;
		
		}else if ($_POST['cancel']) {	//	if deletion is cancelled
		
			$this->msg = 'No product deleted';
		
		}# end if
		
		$product = $this->model->getProductByID($_GET['pid']);
		$html .= $this->displayDeleteProductForm($product);
		return $html;
	
	}# end displayContent
	
		private function displayDeleteProductForm($product)
	{
		$html = '<div class="catalogueProduct"><img src="uploads/thumbnails/'.$product['productImage'].'" alt="'.htmlentities($product['productName'],ENT_QUOTES).'" /></div>'."\n";
		$html .= '<h3>'.$product['productName'].'</h3>'."\n";
		$html .= '<p>$'.sprintf('%.2f',$product['productPrice']).'</p>'."\n";
		$html .= '<p class="mainContent">'.$product['productDescription'].'</p>'."\n";
		$html .= '<div class="clear"></div>'."\n";
		$html .= '<p>Do you want to delete this product?</p>'."\n";
		$html .= '<form method="post" action="'.htmlentities($_SERVER['REQUEST_URI']).'">'."\n";
		$html .= '<input type="hidden" name="productID" value="'.$product['productID'].'" />'."\n";
		$html .= '<input type="hidden" name="productImage" value="'.$product['productImage'].'" />'."\n";
		$html .= '<input type="submit" name="confirm" value="Yes" />'."\n";
		$html .= '<input type="submit" name="cancel" value="No" />'."\n";
		$html .= '</form>'."\n";
		$html .= '<p class="failedMessage">'.$this->msg.'</p>'."\n";
		return $html;
	}
}	
	
	
	
	
	
?>