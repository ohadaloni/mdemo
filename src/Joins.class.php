<?php
/*------------------------------------------------------------*/
class Joins extends Mdemo {
	/*------------------------------------------------------------*/
	public function index() {
		$queries = array(
			array(
				'title' => "Authors",
				'sql' => "select * from authors order by last, first",
				'exportFileName' => "Authors",
			),
			array(
				'title' => "Books",
				'sql' => "select * from books order by title",
				'exportFileName' => "Books",
			),
			array(
				'title' => "Join",
				'sql' => "select a.*, b.* from authors a, books b where a.id = b.authorId order by a.first, a.last, b.title",
				'exportFileName' => "BooksAndAuthors",
			),
			array(
				'title' => "Foundation",
				'sql' => "select a.first, a.last, b.title from authors a, books b where a.id = b.authorId and b.title like '%Foundation%' order by a.first, a.last, b.title",
				'exportFileName' => "Foundation",
			),
			array(
				'title' => "The Complete Cartesian Product",
				'sql' => "select a.*, b.* from authors a, books b order by a.first, a.last, b.title",
				'exportFileName' => "Cartesian",
			),
		);
		foreach ( $queries as $query ) {
			Mview::msg($query['title'], true);
			Mview::msg($query['sql']);
			$rows = $this->Mmodel->getRows($query['sql']);
			$this->showRows($rows, true, $query['exportFileName']);
			echo "<br /><br />\n";
		}
		$file = "Joins.class.php";
		Mview::msg($file);
		highlight_file($file);
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
