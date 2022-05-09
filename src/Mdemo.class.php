<?php
/*------------------------------------------------------------*/
class Mdemo extends Mcontroller {
	/*------------------------------------------------------------*/
	protected $mdemoUtils;
	/*------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
		$this->mdemoUtils = new MdemoUtils;
	}
	/*------------------------------------------------------------*/
	/*------------------------------------------------------------*/
	protected function before() {
		$this->mdemoUtils->prior($this->controller, $this->action);
		$this->Mview->assign(array(
			'controller' => $this->controller,
			'action' => $this->action,
		));
		if ( $this->showMargins()) {
			$this->Mview->showTpl("head.tpl", array(
				'title' => "Mdemo",
			));
			$this->Mview->showTpl("header.tpl");
			$menu = new Menu;
			$menu->index();
		}
		$method = @$_SERVER['REQUEST_METHOD'];
		if ( $method == "GET" ) {
			$url = @$_SERVER['REQUEST_URI'];
			if ( $this->redirectable($url) ) {
				$this->Mview->setCookie("lastVisit", $url);
			}
		}
	}
	/*------------------------------*/
	protected function after() {
		if ( ! $this->showMargins())
			return;
		$this->Mview->showTpl("footer.tpl");
		$this->Mview->showTpl("foot.tpl");
	}
	/*------------------------------------------------------------*/
	/*------------------------------------------------------------*/
	public function index() {
		$this->redirect("/tictactoe");
	}
	/*------------------------------------------------------------*/
	/*------------------------------------------------------------*/
	/*------------------------------------------------------------*/
	private function redirectable($url) {
		if ( ! $url )
			return(false);
		if ( $url == "/" )
			return(false);

		$parts = explode("?", $url);
		$parts = explode("/", $parts[0]);
		$pathParts = array();
		foreach ( $parts as $part )
			if ( $part != "" )
				$pathParts[] = $part;
		if ( ! $pathParts )
			$pathParts = array("mdemo", "index");

		$className = $pathParts[0];
		$action = @$pathParts[1];
		$action = $action ? $action : "index";
		$nots = array(
			'noMargins' => array(
				'any',
			),
		);
		foreach( $nots as $notClassName => $notClass )
			foreach( $notClass as $notAction )
				if ( strcasecmp($notClassName, $className) == 0
						&& 
						( strcasecmp($notAction, $action) == 0 || $notAction == 'any' )
					) {
						return(false);
					}

		$files = Mutils::listDir(".", "php");
		$baseName = null;
		foreach ( $files as $file ) {
			$fileParts = explode(".", $file);
			$baseName = reset($fileParts);
			if(strtolower($className) != strtolower($baseName) )
				continue;
			require_once($file);
			if ( ! class_exists($baseName) ) {
				return(false);
			}
			break;
		}
		if ( ! method_exists($baseName, $action) ) {
			return(false);
		}
		return(true);
	}
	/*------------------------------------------------------------*/
	private function isAjax() {
		$http_x_requested_with = @$_SERVER['HTTP_X_REQUESTED_WITH'];
		$isAjax =
			$http_x_requested_with &&
			strtolower($http_x_requested_with) == "xmlhttprequest" ;
		return($isAjax);
	}
	/*------------------------------*/
	private function showMargins() {
		if ( $this->isAjax() ) {
			return(false);
		}
		if( in_array($this->controller, array(
					'nomargins',
				))) {
			return(false);
		}
		if( in_array($this->action, array(
					// placeholder
				))) {
			return(false);
		}
		return(true);
	}
	/*------------------------------------------------------------*/
}
