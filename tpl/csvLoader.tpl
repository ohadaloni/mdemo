<form method="post" enctype="multipart/form-data">
<table border="0">
	<tr class="mdemoHeaderRow">
		<td colspan="2">Create Table from Uploaded CSV file</td>
	</tr>
	<tr class="mdemoFormRow">
		<td>
			Uploaded File:
		</td>
		<td>
			<input type="file" class="required" size="30" name="file" />
		</td>
	</tr>
	<tr class="mdemoHeaderRow">
		<td colspan="2" align="right">
			<input type="hidden" name="className" value="Admin" />
			<input type="hidden" name="action" value="loadCsv" />
			<input type="submit" value="Upload" />
		</td>
</table>
</form>
