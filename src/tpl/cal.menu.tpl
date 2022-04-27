<form action="/cal/showcal">
<table border="0" style="margin-left:auto;margin-right:auto;">
	<tr class="mdemoFormRow">
		<td>
			<a href="/Cal/prevYear?month={$month}&year={$year}"
				alt="Previous Year" title="Previous Year"><img src="/images/arrowLeft.png" border="0"><img src="/images/arrowLeft.png" border="0"></a>
		</td>
		<td>
			<a href="/Cal/prevMonth?month={$month}&year={$year}"
				alt="Previous Month" title="Previous Month"><img src="/images/arrowLeft.png" border="0"></a>
		</td>
		<td width="10"></td>
		<td>
			{msuShowTpl file="requiredSelect.tpl" listRows=$months varName="month" varValue="$month}
		</td>
		<td>
			<input type="text" size="5" class="required number" name="year" value="{$year}" />
		</td>
		<td>
			<input type="image" border="0"  src="/images/go.png" />
		</td>
		<td width="10"></td>
		<td>
			<a href="/Cal/nextMonth?month={$month}&year={$year}"
				alt="Next Month" title="Next Month"><img src="/images/arrowRight.png" border="0"></a>
		</td>
		<td>
			<a href="/Cal/nextYear?month={$month}&year={$year}"
				alt="Next Year" title="Next Year"><img src="/images/arrowRight.png" border="0"><img src="/images/arrowRight.png" border="0"></a>
		</td>
	</tr>
</table>
</form>
