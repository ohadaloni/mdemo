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
