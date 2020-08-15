<?php
/*------------------------------------------------------------*/
require_once("mdemoConfig.php");
require_once("../M/mfiles.php");
require_once("Mdemo.class.php");
require_once("ShowSource.class.php");
/*------------------------------------------------------------*/
global $Mview;
global $Mmodel;
$Mview = new Mview;
$Mmodel = new Mmodel;
/*------------------------------------------------------------*/
$Mview->assign(array(
	"M" => M_URL,
));
$Mdemo = new Mdemo;
$Mdemo->Mview->showTpl("mdemoHead.tpl", array('seo' => 'seo',));
$Mdemo->Mview->showTpl("seoHeader.tpl");
$Mdemo->Mview->showTpl("mdemoHeader.tpl");
$Mdemo->control("Authors", "listAuthors");
$authors = $Mdemo->Mmodel->getRows("select * from authors order by last,first");
foreach ( $authors as $author ) {
	$id = $author['id'];
	$Mdemo->control("Authors", "listBooks", "authorId=$id");
}
$Mdemo->control("TicTacToe", "index");
$Mdemo->control("Joins", "index");
$Mdemo->control("Cal", "index");
$sourceFiles = ShowSource::fileList();
foreach ( $sourceFiles as $id => $notNeeded )
	$Mdemo->control("ShowSource", "showFile", "fileId=$id");
$Mdemo->Mview->showTpl("mdemoFooter.tpl");
$Mdemo->Mview->showTpl("mdemoFoot.tpl");
/*------------------------------------------------------------*/
