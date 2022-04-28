<?php
/*------------------------------------------------------------*/
class Authors extends Mdemo {
	/*------------------------------------------------------------*/
	public function index() {
		$sql = "select * from authors order by last,first";
		$authors = $this->Mmodel->getRows($sql);
		$authorId = @$_REQUEST['authorId'];
		if ( $authorId ) {
			$sql = "select * from books where authorId = $authorId order by title";
			$books = $this->Mmodel->getRows($sql);
		}
		$this->Mview->showTpl("authors.tpl", array(
			'authors' => $authors,
			'authorId' => $authorId,
			'books' => $books,
		));
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
