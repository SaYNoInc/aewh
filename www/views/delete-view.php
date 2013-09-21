<?php

class DeleteView extends View{

protected function displayContent(){

		$result = $this->model->deleteInsp();
		$html = '<script type="text/javascript">alert("Inspirations successfully deleted"); window.location.replace("index.php?page=inspirations"); </script>';

		return $html;
}# end displayContent



}# end HomeView
?>