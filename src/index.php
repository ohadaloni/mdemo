<?php
/*------------------------------------------------------------*/
require_once("mdemoConfig.php");
require_once(M_DIR."/mfiles.php");
require_once("mdemoFiles.php");
require_once("Mdemo.class.php");
/*------------------------------------------------------------*/
$startTime = microtime(true);
/*------------------------------------------------------------*/
global $Mview;
global $Mmodel;
$Mview = new Mview;
$Mmodel = new Mmodel;
$Mview->holdOutput();
/*------------------------------------------------------------*/
$mdemo = new Mdemo($startTime);
$mdemo->control();
$Mview->flushOutput();
/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
