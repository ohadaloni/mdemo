<table border="1">
	{foreach from=$game key=x item=row}
		<tr>
			{foreach from=$row key=y item=cell}
				<td align="center" valign="middle">
				{if $cell == 'X'}
					<img border="0" src="/images/ticTacToeX.png" />
				{elseif $cell == 'O'}
					<img border="0" src="/images/ticTacToeO.png" />
				{else}
					{if $active}
						<a href="/TicTacToe/play?x={$x}&y={$y}"><img border="0"
							src="/images/ticTacToe.png" title="click to play" /></a>
					{else}
						<img border="0" src="/images/ticTacToe.png" />
					{/if}
				{/if}
			{/foreach}
		</tr>
	{/foreach}
</table>

