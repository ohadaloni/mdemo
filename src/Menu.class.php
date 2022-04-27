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
					'name' => 'authors',
					'title' => 'Authors and Books',
					'url' => "/authors",
				),
				array(
					'name' => 'cal',
					'title' => 'YAC (Yet Another Calendar)',
					'url' => "/cal",
				),
				array(
					'name' => 'joins',
					'title' => 'joins',
					'url' => "/joins",
				),
				array(
					'name' => 'source',
					'title' => 'Show Source Code',
					'url' => "/showSource",
				),
				array(
					'name' => 'tictactoe',
					'title' => 'Tic Tac Toe',
					'url' => "/tictactoe",
				),
			),
		);
		return($menu);
	}
	/*------------------------------------------------------------*/
}

