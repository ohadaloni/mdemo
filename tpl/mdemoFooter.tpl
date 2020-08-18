{if ! $smarty.request.saas }
<div class="footer">
{literal}
<table border="0"><tr><td align="left">
<pre>
/*------------------------------------------------------------*/
class Authors extends Mtable {
	/*------------------------------------------------------------*/
	public function __construct() {
		parent::__construct("authors", "last, first");
	}
	/*------------------------------------------------------------*/
	public function listAuthors() {
		$this->Mview->showTpl("authorsList.tpl", array(
			"authors" => $this->Mmodel->getRows("select * from authors order by last,first"),
		));
	}
	/*------------------------------------------------------------*/
	public function listBooks() {
		$authorId = $_REQUEST['authorId'];
		$this->Mview->showTpl("bookList.tpl", array(
			"books" => $this->Mmodel->getRows("select * from books where authorId = $authorId order by title"),
		));
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
</pre>
</td></tr></table>
{/literal}
</div>
<div class="copy">&copy; Copyright Ohad Aloni. 2020. All Rights Reserved.<br /></div>
{/if}
