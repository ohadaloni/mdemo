<table border="0">
	<tr class="mdemoHeaderRow">
		<td>Book Title</td>
		<td>Author</td>
		<td colspan="3">
	</tr>
	{foreach from=$rows item=row}
		<tr class="mdemoRow{if $row.id == $currentRow} currentRow{/if}">
			<td>{$row.title}</td>
			<td>{$row.authorId|bookAuthor}</td>
			<td><a href="?className=Books&action=edit&id={$row.id}"><img border="0" src="images/edit.png" alt="Edit" title="Edit" /></a></td>
				<td><a href="?className={$className}&tableName={$tableName}&action=duplicate&id={$row.id}"><img border="0" src="images/duplicate.png" alt="Duplicate" title="Duplicate" /></a></td>
			<td><a class="noHijax" href="javascript:mdemoConfirmDelete('Books', 'books', {$row.id}, '{$row.title}')"><img border="0" src="images/delete.png" alt="Delete" title="Delete" /></a></td>
		</tr>
	{/foreach}
</table>
<div id="bookList"></div>
