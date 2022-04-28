<?php
/*------------------------------------------------------------*/
class Menu extends Mcontroller {
	/*------------------------------------------------------------*/
	public function index() {
			$this->Mview->showTpl("menuDriver.tpl", array(
				'menu' => $this->dd(),
			));
	}
	/*------------------------------------------------------------*/
	/*------------------------------------------------------------*/
	private function dd() {
		$menu = array(
			'mdemo' => array(
				array(
					'name' => 'mdemo',
					'title' => 'M Demo Home',
					'url' => "/",
				),
				array(
					'about' => 'about',
					'title' => 'About',
					'url' => "/mdemo/about",
				),
			),
			'Library' => array(
				array(
					'name' => 'authors',
					'title' => 'Authors and Books',
					'url' => "/authors",
				),
				array(
					'name' => 'joins',
					'title' => 'joins',
					'url' => "/joins",
				),
			),
			'Games' => array(
				array(
					'name' => 'tictactoe',
					'title' => 'Tic Tac Toe',
					'url' => "/tictactoe",
				),
			),
			'Source Code' => array(
				array(
					'name' => 'source',
					'title' => 'Show Source Code',
					'url' => "/showSource",
				),
			),
		);
		return($menu);
	}
	/*------------------------------------------------------------*/
}

