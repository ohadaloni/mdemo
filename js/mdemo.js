/*------------------------------------------------------------*/
$(function() {
	mdemoPaintRows(document);
	/*	$(".imgToolTip").imgToolTip();	*/
	$(".showImage").showImage();
});
/*------------------------------------------------------------*/
function mdemoPaintRows(context)
{
	$(".mRow", context).hoverClass("hilite");
	$(".mdemoRow", context).hoverClass("hilite");
	$(".mFormRow", context).hoverClass("hilite");
	$(".mHeaderRow", context).addClass("mdemoZebra0");
	$(".mdemoHeaderRow", context).addClass("mdemoZebra0");
	$(".mFormRow:nth-child(odd)", context).addClass("mdemoZebra1");
	$(".mFormRow:nth-child(even)", context).addClass("mdemoZebra2");
	$(".mRow:nth-child(odd)", context).addClass("mdemoZebra1");
	$(".mRow:nth-child(even)", context).addClass("mdemoZebra2");
	$(".mdemoRow:nth-child(odd)", context).addClass("mdemoZebra2");
	$(".mdemoRow:nth-child(even)", context).addClass("mdemoZebra1"); // first row is 1
	$(".mdemoFormRow:nth-child(odd)", context).addClass("mdemoZebra2");
	$(".mdemoFormRow:nth-child(even)", context).addClass("mdemoZebra1"); // first row is 1

	$(".today:nth-child(odd)", context).addClass("mdemoZebra3");
	$(".today:nth-child(even)", context).addClass("mdemoZebra4");
	$(".yesterday:nth-child(odd)", context).addClass("mdemoZebra5");
	$(".yesterday:nth-child(even)", context).addClass("mdemoZebra6");

}
/*------------------------------------------------------------*/
