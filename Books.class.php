<?php
/*------------------------------------------------------------*/
class Books extends Mtable {
	/*------------------------------------------------------------*/
	public function __construct() {
		parent::__construct("books", "authorId, title");
		$this->Mview->assign(array(
			"authorsList" => $this->authorsList(),
		));
		$this->Mview->registerModifier("bookAuthor", "Books");
	}
	/*------------------------------------------------------------*/
	private function authorsList() {
		$authors = $this->Mmodel->getRows("select * from authors order by last, first");
		$authorsList = array();
		foreach ( $authors as $author )
			$authorsList[$author['id']] = $author['first']." ".$author['last'];
		return($authorsList);
	}
	/*------------------------------------------------------------*/
	public static function bookAuthor($authorId) {
		$m = new Mmodel;
		return($m->getString("select concat(first, ' ', last) from authors where id = $authorId"));
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
