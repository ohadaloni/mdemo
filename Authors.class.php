<?php
/*------------------------------------------------------------*/
class Authors extends Mtable {
	/*------------------------------------------------------------*/
	/**
	 * an M scaffold is and extension of the class Mtable which in turn extends Mcontroller
	 * tell it the name of the table and the default sort order
	 */
	public function __construct() {
		parent::__construct("authors", "last, first");
	}
	/*------------------------------------------------------------*/
	public function listAuthors() {
		/**
		 * use Mmodel to get the data from the database
		 * and pass the data to Mview to send the ajaxed content
		 * back to the browser for display
		 * 
		 */
		$this->Mview->showTpl("authorsList.tpl", array(
			"authors" => $this->Mmodel->getRows("select * from authors order by last,first"),
		));
	}
	/*------------------------------------------------------------*/
	public function listBooks() {
		/**
		 * more the same
		 */
		$authorId = $_REQUEST['authorId'];
		$this->Mview->showTpl("bookList.tpl", array(
			"books" => $this->Mmodel->getRows("select * from books where authorId = $authorId order by title"),
		));
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
