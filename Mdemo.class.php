<?php
/*------------------------------------------------------------*/
class Mdemo extends Mcontroller {
	/*------------------------------------------------------------*/
	/**
	 * allow Mcontroller to do all the URL dispatching
	 * (this controller is called from index.php)
	/*------------------------------------------------------------*/
	/**
	 * if the url has no action specified, than we are just starting.
	 * show the frame page with the header, footer and the jquery UI tab center setup.
	 */
	public function index() {
		$this->Mview->showTpl("mdemo.tpl", array(
			"M" => M_URL,
		));
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
