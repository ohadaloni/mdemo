/*------------------------------------------------------------*/
$(function() {
	/*	$('a').not(".keep").off('click').click(function() {	*/
	$('a').not(".keep").click(function() {
		document.location = "http://theora.com/Mdemo/";
		return(false);
	});
	mdemoBindAll(document);
});
/*------------------------------------------------------------*/
function mdemoPaintRows(context)
{
	mPaintRows();
	$(".mdemoRow", context).hoverClass("hilite");
	$(".mdemoFormRow", context).hoverClass("hilite");
	$(".mdemoHeaderRow", context).addClass("zebra0");
	$(".mdemoFormRow:nth-child(odd)", context).addClass("zebra1");
	$(".mdemoFormRow:nth-child(even)", context).addClass("zebra2");
	$(".mdemoRow:nth-child(odd)", context).addClass("zebra1");
	$(".mdemoRow:nth-child(even)", context).addClass("zebra2");
}
/*------------------------------*/
function mdemoBindAll(context)
{
	if ( ! context )
		context = document;

	mdemoPaintRows(context);

	$(".mdemoRow", context).click(function(){
		$(".mdemoRow").not(this).removeClass("keepHilited");
		$(this).addClass("keepHilited");
	});
	$(".showImage").showImage();
	$(".imgToolTip").imgToolTip();
}
/*------------------------------------------------------------*/
