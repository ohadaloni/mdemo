<?php
/*------------------------------------------------------------*/
require_once(M_DIR."/McsvLoader.class.php");
require_once("Mdemo.class.php");
/*------------------------------------------------------------*/
class Admin extends Mcontroller {
	/*------------------------------------------------------------*/
	public function menu() {
		$this->Mview->showTpl("admin.tpl");
	}
	/*------------------------------------------------------------*/
	public function csvLoaderForm() {
		$this->top("Load a CSV into table");
		$this->Mview->showTpl("csvLoader.tpl");
		$this->bottom();
	}
	/*------------------------------*/
	public function loadCsv() {
		$this->top("CSV Loader");
		$mcl = new McsvLoader();
		$tableName = $mcl->load(1000, true);
		if ( $tableName ) {
			$rowNum = $this->Mmodel->rowNum($tableName);
			Mview::msg("Loaded $rowNum rows into $tableName");
			$sampleSql = $this->Mmodel->sampleSql($tableName);
			$this->showRows($sampleSql);
		} else
			$this->csvLoaderForm();
		$this->bottom();
	}
	/*------------------------------------------------------------*/
	private function foot() {
		static $wasHere = false;
		if ( $wasHere )
			return;
		$wasHere = true;
		$this->Mview->showTpl("mdemoFoot.tpl");
	}
	/*------------------------------------------------------------*/
	private function footer() {
		static $wasHere = false;
		if ( $wasHere )
			return;
		$wasHere = true;
		$this->Mview->showTpl("mdemoFooter.tpl");
	}
	/*------------------------------------------------------------*/
	private function header() {
		static $wasHere = false;
		if ( $wasHere )
			return;
		$wasHere = true;
		$this->Mview->showTpl("mdemoHeader.tpl");
	}
	/*------------------------------------------------------------*/
	private function head($title = null) {
		static $wasHere = false;
		if ( $wasHere )
			return;
		$wasHere = true;
		$pfx = "Mdemo";
		if ( $title )
			$theTitle = "$pfx - $title";
		else
			$theTitle = $pfx;
		$this->Mview->showTpl("mdemoHead.tpl", array(
			'title' => $theTitle,
		));
	}
	/*------------------------------------------------------------*/
	private function top($title = null) {
		static $wasHere = false;
		if ( $wasHere )
			return;
		$wasHere = true;
		$this->head($title);
		$this->header();
	}
	/*------------------------------------------------------------*/
	private function bottom() {
		static $wasHere = false;
		if ( $wasHere )
			return;
		$wasHere = true;
		$this->footer();
		$this->foot();
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
