<!--
	display all header and footer information
	and let jquery UI tabs Ajax everything else in the center without ever refreshing
-->
{msuShowTpl file="mdemoHead.tpl"}
{msuShowTpl file="mdemoHeader.tpl"}
<div style="font-size:70%;" class="tabs">
	<ul>
		<li><a class="noHijax tabLabel" href="?className=Authors&action=listAuthors"><span>Authors & Books</span></a></li>
		<li><a class="noHijax tabLabel" href="?className=TicTacToe"><span>Tic Tac Toe</span></a></li>
		<li><a class="noHijax tabLabel" href="?className=Joins"><span>Join Tutorial</span></a></li>
		<li><a class="noHijax tabLabel" href="?className=Cal"><span>Calendar</span></a></li>
		<li><a class="noHijax tabLabel" href="?className=ShowSource"><span>See the Source Code</span></a></li>
		<!--	<li><a class="noHijax tabLabel" href="?className=Mview&action=showTpl&tpl=admin.tpl"><span>Admin</span></a></li>	-->
	</ul>
</div>
{msuShowTpl file="mdemoFooter.tpl"}
{msuShowTpl file="mdemoFoot.tpl"}
