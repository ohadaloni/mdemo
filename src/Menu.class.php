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
		$thisMonth = date("n");
		$thisYear = date("Y");
		$prevMonth = ($thisMonth - 1 + 12)%12 ;
		$nextMonth = ($thisMonth + 1)%12 ;
		$thisMonthName = Mdate::monthLname($thisMonth);
		$prevMonthName = Mdate::monthLname($prevMonth);
		$nextMonthName = Mdate::monthLname($nextMonth);
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
			'YACC' => array(
				array(
					'name' => 'cal',
					'title' => 'Yet Another Calendar Calendar',
					'url' => "/cal",
				),
				array(
					'name' => 'prevMonth',
					'title' => $prevMonthName,
					'url' => "/cal/prevMonth?month=$thisMonth&year=$thisYear",
				),
				array(
					'name' => 'thisMonth',
					'title' => $thisMonthName,
					'url' => "/cal",
				),
				array(
					'name' => 'nextMonth',
					'title' => $nextMonthName,
					'url' => "/cal/nextMonth?month=$thisMonth&year=$thisYear",
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

