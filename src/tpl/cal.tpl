<table border="0" style="margin-left:auto;margin-right:auto;">
	<tr class="mdemoHeaderRow">
		<td>
			Sunday
		</td>
		<td>
			Monday
		</td>
		<td>
			Tuesday
		</td>
		<td>
			Wednsday
		</td>
		<td>
			Thursday
		</td>
		<td>
			Friday
		</td>
		<td>
			Saturday
		</td>
	</tr>
	{foreach from=$cal item=week}
		<tr class="mdemoRow">
				{foreach from=$week item=day}
					<td>
						{if $day == $today}
							<span style="color:blue">{$day}</span>
						{else}
							{$day}
						{/if}
					</td>
				{/foreach}
		</tr>
	{/foreach}
</table>
