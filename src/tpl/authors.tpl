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
			{ if
			}authorId
		</td>
	</tr>
</table>



<table border="0">
	<tr>
		<td valign="top">
			<table border="0">
				<tr class="mdemoHeaderRow">
					<td>File Name</td>
				</tr>
				{foreach from=$files key=name item=file}
					<tr class="mdemoRow">
						<td>
							<a href="/showSource?file={$file}">{$name}</a>
						</td>
					</tr>
				{/foreach}
				</tr>
			</table>
		</td>
		<td valign="top">
			{if $source}
				<h4>{$sourceFileName}</h4>
				{$source}
			{/if}
		</td>
	</tr>
</table>
