<?php

	class ProductView extends View{

		private $products;
		private $prodPerPage = 2; // holds number of products to be displayed
		private $pageNum; // indentifies the page number

		public function __construct($pageInfo, $model){
		
			parent::__construct($pageInfo, $model);
			if ($_GET['pgNr']) {
				$this->pageNum = $_GET['pgNr']; // does url contain page number, if so use it
			}else{
				$this->pageNum = 1;
			}# end if
		}# end __construct

		protected function displayContent(){

			$html = '<h2>'.$this->pageInfo['pageHeading'].'</h2>'."\n";
			
			// $this-> products = $this-> model-> getProducts();
			$this->products = $this->model->getProductsByBatch($this->pageNum, $this->prodPerPage);

			// echo "<pre>";
			// print_r($this-> products);
			// echo "</pre>";
			
			if (is_array($this-> products)) {

				$html .= $this-> displayProducts();
			
			}else{
				$html .= '<p>There are no products.</p>';
			}# end if

			$html .= $this->displayPageLinks();

			return $html;

		}# end displayContent

		private function displayProducts(){
			
			$html = '';
			
			foreach ($this->products as $product) {
			
				$html .= '<div class="catalogueProduct"><a href="index.php?page=singleProduct&amp;pid='.$product['productID'].'">';
				$html .= '<img src="uploads/thumbnails/'.$product['productImage'].'" alt="'.$product['productName'].'" /> </a>'."\n";
				$html .= '<h3><a href="index.php?page=singleProduct&amp;pid='.$product['productID'].'">'.$product['productName'].'</a></h3>'."\n";
				$html .= '<p class="mainContent">'.$product['productDescription'].'</p>'."\n";
				$html .= '<div class="clear"></div>'."\n";
				$html .= '</div>'."\n";


				if ($this->model->adminLoggedIn) {
					$html .= '<p><a href="index.php?page=editProduct&amp;pid='.$product['productID'].'">Edit</a> | ';
					$html .= '<a href="index.php?page=deleteProduct&amp;pid='.$product['productID'].'">Delete</a></p>'."\n";
				}# end if

			}# end foreach

			return $html;
		}# end displayProducts

		private function displayPageLinks(){
			$html = '<div id="pgLinks">';
			if ($this->pageNum == 1) {
				$html .= 'Pages: ';
			}else{
				$html .= '&lt; <a href="index.php?page=products&amp;pgNr='.($this->pageNum -1 ).'">Previous</a> | '."\n";
			}# end if
			$prodCount = $this->model->countProducts();
			
			if ($prodCount % $this->prodPerPage == 0) { //if exact multiple of products per page (meaning remainder is zero)
			
				$totalPages = $prodCount / $this->prodPerPage;
			
			}else{
			
				$totalPages = floor($prodCount / $this->prodPerPage) + 1;
			
			}# end if
			
			for ($i=1; $i <= $totalPages; $i++) { 
			
				if ($i == $this->pageNum) { // is the current page?
				
					$span = '<span class="curpage">'.$i.'</span>';
				
				}else{
					
					$span = $i;
				
				}# end if
			
				$html .= '<a href="index.php?page=products&amp;pgNr='.$i.'">'.$span.'</a>';
			
				if ($i != $totalPages) { // if not the last page
					
					$html .= ' | ';

				}# end if
			
			}# end for
			
			if ($this->pageNum != $totalPages) { // if the last page not the current page
					
					$html .= ' | <a href="index.php?page=products&amp;pgNr='.($this->pageNum + 1).'">Next</a> &gt;'."\n";

			}# end if

			$html .= '</div>'."\t\t".'<!-- end of page links -->'."\n";
			return $html;

		}# end displayPageLinks









	}# end HomeView
?>