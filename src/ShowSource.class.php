<?php
/*------------------------------------------------------------*/
class ShowSource extends Mdemo {
	/*------------------------------------------------------------*/
	public function index() {
		$file = @$_REQUEST['file'];
		if ( $file ) {
			$parts = explode("/", $file);
			$sourceFileName = end($parts);
			$source = highlight_file($file, true);
		}
		$this->Mview->showTpl("showSource.tpl", array(
			'files' => $this->fileList(),
			'sourceFileName' => @$sourceFileName,
			'source' => @$source,
		));
	}
	/*------------------------------------------------------------*/
	public function fileList() {
		$mdir = M_DIR ;
		$files = array(
			"index.php",
			"Mdemo.class.php",
			"Authors.class.php",
			"TicTacToe.class.php",
			"Joins.class.php",
			"Cal.class.php",
			"ShowSource.class.php",
			"$mdir/Mmodel.class.php",
			"$mdir/Mview.class.php",
			"$mdir/Mcontroller.class.php",
		);
		$fileList = array();
		foreach ( $files as $file ) {
			$parts = explode("/", $file);
			$name = end($parts);
			$fileList[$name] = $file ;
		}
			
		return($fileList);
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
