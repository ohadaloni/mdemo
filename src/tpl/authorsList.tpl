<table border="0">
	<tr>
		<td valign="top">
			<table border="0">
				<tr class="mdemoHeaderRow">
					<td>First Name</td>
					<td>Last Name</td>
				</tr>
				{foreach from=$authors item=author}
					<tr class="mdemoRow">
						<td>{$author.first}</td>
						<td class="authorLastName" id="{$author.id}">{$author.last}</td>
					</tr>
				{/foreach}
			</table>
		</td>
		<td valign="top">
			<div id="bookList"></div>
		</td>
	</tr>
</table>
