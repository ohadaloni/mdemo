<?php
/*------------------------------------------------------------*/
/*
/*------------------------------------------------------------*/
session_start();
/*------------------------------------------------------------*/
require_once("mdemoConfig.php");
require_once(M_DIR."/mfiles.php");
require_once("Mdemo.class.php");
/*------------------------------------------------------------*/
date_default_timezone_set("Asia/Jerusalem");
/*------------------------------------------------------------*/
global $Mview;
global $Mmodel;
$Mview = new Mview;
$Mmodel = new Mmodel;
/*------------------------------------------------------------*/
/**
 * Mdemo extends Mcontroller and so dispatches URLs from here
 * use PATH_INFO=/className/action/otherparts for mod rewrite pretty URLs or just ?className=...&action=...&otherargs
 * Mcontroller extended $this->pathParts() returns array of argumnets to pretty URLs
 */
$Mdemo = new Mdemo;
$Mdemo->control();
/*------------------------------------------------------------*/
