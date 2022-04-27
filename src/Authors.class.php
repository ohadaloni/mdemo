<?php
/*------------------------------------------------------------*/
class Authors extends Mdemo {
	/*------------------------------------------------------------*/
	public function index() {
		$this->listAuthors();
	}
	/*------------------------------------------------------------*/
	public function listAuthors() {
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
