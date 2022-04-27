<?php
/*------------------------------------------------------------*/
class Cal extends Mdemo {
	/*------------------------------------------------------------*/
	public function index() {
		$this->showCal(date("Y"), date("n"));
	}
	/*------------------------------------------------------------*/
	public function showCal($year = null, $month = null) {
		if ( ! $year )
			$year = $_REQUEST['year'];
		if ( ! $month )
			$month = $_REQUEST['month'];
		$cal = Mcal::cal($year, $month);
		$this->menu($year, $month);
		$this->Mview->showTpl("cal.tpl", array(
			'cal' => $cal,
			'today' => ( date("Y") == $year && date("n") == $month ) ? date("d") : null,
		));
	}
	/*------------------------------------------------------------*/
	private function menu($year = null, $month = null) {
		if ( $year == null )
			$year = date("Y");
		if ( $month == null )
			$month = date("m");
		$this->Mview->showTpl("cal.menu.tpl", array(
			'year' => $year,
			'month' => $month,
			'months' => Mdate::monthLlist(),
		));
	}
	/*------------------------------------------------------------*/
	public function nextYear() {
		$this->showCal($_REQUEST['year']+1, $_REQUEST['month']);
	}
	/*------------------------------------------------------------*/
	public function prevYear() {
		$this->showCal($_REQUEST['year']-1, $_REQUEST['month']);
	}
	/*------------------------------------------------------------*/
	public function nextMonth() {
		$this->showCal($_REQUEST['year'] + (($_REQUEST['month'] == 12) ? 1 : 0), ($_REQUEST['month'])%12+1);
	}
	/*------------------------------------------------------------*/
	public function prevMonth() {
		$this->showCal($_REQUEST['year'] - (($_REQUEST['month'] == 1) ? 1 : 0), ($_REQUEST['month']+10)%12+1);
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
