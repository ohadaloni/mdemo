<table border="0">
	<tr class="mdemoHeaderRow">
		<td>Book Titles</td>
	</tr>
	{foreach from=$books item=book}
		<tr class="mdemoRow">
			<td>{$book.title}</td>
		</tr>
	{/foreach}
</table>
