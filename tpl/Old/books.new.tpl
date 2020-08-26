<form method="post" class="validateForm">
	<table border="0">
		<tr class="mdemoFormRow">
			<td>Author</td>
			<td>
				{msuShowTpl file="requiredSelect.tpl" listRows=$authorsList varName="authorId" varValue=$row.authorId}
			</td>
		</tr>
		<tr class="mdemoFormRow">
			<td>title</td>
			<td><input type="text" name="title" size="40" value="{$row.title}" /></td>
		</tr>
		<tr class="mdemoHeaderRow">
			<td colspan="2">
				<input type="hidden" name="className" value="Books" />
				<input type="hidden" name="action" value="dbInsert" />
				<input type="submit" value="New Book" />
			</td>
		</tr>
	</table>
</form>
