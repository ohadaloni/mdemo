<table border="0">
	<tr>
		<td valign="top">
			<table border="0">
				<tr class="mdemoHeaderRow">
					<td>First Name</td>
					<td>Last Name</td>
				</tr>
				{foreach from=$authors item=author}
					<tr
						{if $author.id == $authorId}
							class="keepHilited"
						{else}
							class="mdemoRow"
						{/if}
					>
						<td>{$author.first}</td>
						<td>
							<a href="/authors?authorId={$author.id}">{$author.last}</a>
						</td>
					</tr>
				{/foreach}
			</table>
		</td>
		<td valign="top">
			{if $authorId}
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
			{/if}
		</td>
	</tr>
</table>


