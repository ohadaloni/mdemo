<?php
/*------------------------------------------------------------*/
require_once("mdemoConfig.php");
require_once(M_DIR."/mfiles.php");
require_once("mdemoFiles.php");
require_once("Mdemo.class.php");
/*------------------------------------------------------------*/
global $Mview;
global $Mmodel;
$Mview = new Mview;
$Mmodel = new Mmodel;
$Mview->holdOutput();
/*------------------------------------------------------------*/
$mdemo = new Mdemo;
$mdemo->control();
$Mview->flushOutput();
/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
