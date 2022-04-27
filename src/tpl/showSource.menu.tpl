<table border="0">
	<tr>
		<td valign="top">
			<table border="0">
				<tr class="mdemoHeaderRow">
					<td>File Name</td>
				</tr>
				{foreach from=$files key=fileId item=file}
					<tr class="mdemoRow">
						<td class="showFile" id="{$fileId}">{$file}</td>
					</tr>
				{/foreach}
				</tr>
			</table>
		</td>
		<td valign="top">
			<div id="showSource"></div>
		</td>
	</tr>
</table>
