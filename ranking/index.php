<?php

require_once('c:/wamp/www/sites/mundial2k10/' . '/system/SysController.php');
require_once('c:/wamp/www/sites/mundial2k10/' . '/ranking/RankingCtr.php');

$sysController=new SysController();
$sysController->start();

$ctr=new RankingCtr();
$ctr->control();

$sysController->sysLayout->header();
$sysController->ui->display();
$sysController->sysLayout->footer();

$sysController->end();

?>
