<?php
/*------------------------------------------------------------*/
class ShowSource extends Mcontroller {
	/*------------------------------------------------------------*/
	public function index() {
		$this->menu();
	}
	/*------------------------------------------------------------*/
	public function fileList() {
		$files = array(
			"index.php",
			"Mdemo.class.php",
			"tpl/mdemo.tpl",
			"Authors.class.php",
			"TicTacToe.class.php",
			"Joins.class.php",
			"Cal.class.php",
			"ShowSource.class.php",
			"../M/Mmodel.class.php",
			"../M/Mview.class.php",
			"../M/Mcontroller.class.php",
		);
		return($files);
	}
	/*------------------------------------------------------------*/
	public function menu() {
		$this->Mview->showTpl("showSource.menu.tpl", array(
			'files' => $this->fileList(),
		));
	}
	/*------------------------------------------------------------*/
	public function showFile($file = null) {
		if ( ! $file ) {
			$fileId = $_REQUEST['fileId'];
			$files = $this->fileList();
			$file = $files[$fileId];
		}
		echo "<h4>$file</h4>\n";
		highlight_file($file);
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
