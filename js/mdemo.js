/*------------------------------------------------------------*/
$tabs = null ;
theTab = null ;
/*------------------------------------------------------------*/
$(function() {
	initTabs();
	mdemoBindAll(document);
});
/*------------------------------------------------------------*/
function mdemoBind()
{
	mdemoBindAll(this);
}
/*------------------------------------------------------------*/
function containingTab(obj)
{
	cur = $(obj).parent();

	while ( true ) {
		if ( ! cur || cur.size() == 0 ) {
			return(null);
		}
		if ( $(cur).hasClass("ui-tabs-panel") )
			return(cur);
		cur = cur.parent();
	}
}
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

	// hijax all links to load to their tab
	// except those marked with a noHijax class
	$('a', context).not(".noHijax").click(function() {
		theTab = containingTab(this);
		if ( theTab ) {
			theTab.html('<img border="0" src="images/loading.gif" />');
			href = this.href;
			if ( href.indexOf("?") >= 0 )
				href += "&";
			else
				href += "?";
			href += "Ajax=Ajax";
			theTab.load(href, mdemoBind);
			return(false);
		}
		return(true);
	});

	mdemoPaintRows(context);

	$(".mdemoRow", context).click(function(){
		$(".mdemoRow").not(this).removeClass("keepHilited");
		$(this).addClass("keepHilited");
	});
	$(".autocomplete", context).Mautocomplete();
	$(".jeditable", context).editable("?className=Mmodel&action=saveFieldInfo", { placeholder:'',tooltip:'Click to Edit'});
	$(".jeditableText", context).editable('?className=Mmodel&action==saveFieldInfo', { 
		type      : 'wysiwyg',
		tooltip   : 'Click to Edit...',
		onblur    : 'ignore', /* don't set this to cancel with wysiwyg */
		submit    : 'OK',
		placeholder    : '',
		cancel    : 'Cancel'
		});

	$(".datepicker", context).datepicker({
		changeYear: true 
	});
	$(".DOBdatepicker", context).datepicker({
		changeYear: true 
		,defaultDate: '-30y'
	});

	$(".validateForm", context).validate();
	$(".validateForm", context).not(".noTabs", context).submit(submitFormInTab);

	/* must bind the validation separetaly to forms appearing on the same page */
	/* or the plugin gets confused */
	/*	$("#formId #fieldName", context).change(alert("changed formId fieldName");	*/

	$(".showImage").showImage();
	$(".imgToolTip").imgToolTip();

	$(".authorLastName", context).hoverClass("handCursor").click(function() {
		$("#bookList").html('<img border="0" src="images/loadingSpinner.gif" />');
		url = "?className=Authors&action=listBooks&authorId=" + this.id;
		$("#bookList").load(url, mdemoBind);
	});

	$(".showFile", context).hoverClass("handCursor").click(function() {
		$("#showSource").html('<img border="0" src="images/loading.gif" />');
		url = "?className=ShowSource&action=showFile&fileId=" + this.id ;
		$("#showSource").load(url, mdemoBind);
	});
}
/*------------------------------------------------------------*/
function submitFormInTab()
{
	if ( ! $(this).valid() ) {
		return(false);
	}

	theTab = containingTab(this);
	if ( ! theTab )
		return(true);
	
	data = $(this).serialize();
	href = "?" + data ;
	theTab.html('<img border="0" src="images/loading.gif" />');
	theTab.load(href, mdemoBind);
	return(false);
}
/*------------------------------------------------------------*/
function tabClicked()
{
	theTab = $('.ui-tabs-panel:visible');
	theTab.html('<img border="0" src="images/loading.gif" />');
	index = $tabs.tabs('option', 'selected');
	$tabs.tabs('load', index);
}

/*------------------------------*/
function afterTabLoad(event, ui)
{
	mdemoBindAll(ui.panel);
}
/*------------------------------*/
function initTabs()
{
    $tabs = $(".tabs").tabs({
		load:afterTabLoad
		,spinner:'<img border="0" src="images/loadingSpinner.gif" />',
		});
	$(".tabLabel").click(tabClicked);
}
/*------------------------------------------------------------*/
function mdemoConfirmDelete(className, tableName, id, warnMessage)
{
	if ( ! confirm("Are you sure you want to delete this row from " + tableName + " (" + warnMessage + ") ?") )
		return;

	href = "?className=" + className + "&tableName=" + tableName + "&action=dbDelete&id=" + id ;
	if ( theTab ) {
		theTab.html('<img border="0" src="images/loading.gif" />');
		theTab.load(href, mdemoBind);
	} else
		document.location = href;
}

/*------------------------------------------------------------*/
