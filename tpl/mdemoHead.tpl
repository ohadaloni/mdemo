<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>
		{if $smarty.server.SERVER_NAME == 'puma' || $smarty.server.SERVER_NAME == '192.168.1.42'}
			puma - Mdemo
		{else}
			Theora.com M Demo
		{/if}
	</title>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.5.custom/js/jquery-ui-1.8.5.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.5.custom/development-bundle/ui/jquery-ui-1.8.5.custom.js"></script>
	<script type="text/javascript" src="js/jquery.hoverClass.js"></script>
	<link type="text/css" href="js/jquery-ui-1.8.5.custom/development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />
	<link type="text/css" href="js/jquery-ui-1.8.5.custom/development-bundle/themes/base/jquery.ui.dialog.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="js/jquery-tooltip/lib/jquery.dimensions.js"></script>
	<script type="text/javascript" src="js/jquery-tooltip/jquery.tooltip.js"></script>
	<script type="text/javascript" src="js/jquery.imgToolTip.js"></script>
	<script type="text/javascript" src="js/jquery-autocomplete/jquery.autocomplete.js"></script>
	<link rel="stylesheet" href="js/jquery-autocomplete/jquery.autocomplete.css" type="text/css"></link>
	<script type="text/javascript" src="js/jquery.Mautocomplete.js"></script>
	<script type="text/javascript" src="js/jquery.showImage.js"></script>
	<link rel="stylesheet" href="css/jquery.wysiwyg.css" type="text/css"></link>
	<link rel="stylesheet" type="text/css" href="js/jquery-tooltip/jquery.tooltip.css"></link>
	{if $seo}
		<script type="text/javascript" src="js/seo.js"></script>
	{else}
		<script type="text/javascript" src="js/mdemo.js"></script>
	{/if}
	<link rel="stylesheet" type="text/css" href="css/mdemo.css"></link>
</head>
<body>
