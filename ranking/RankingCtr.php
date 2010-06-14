<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/apuesta/UserMdl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/ranking/RankingMdl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/ranking/RankingUI.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/system/GenericUI.php');

class RankingCtr
{

	function RankingCtr(){

	}
	
	//----------------
	
	function control(){
	
		global $sysController;
	
		if (isset($_POST["do"])){
			$do=$_POST["do"];
		}else{
			if (isset($_GET["do"])){
				$do=$_GET["do"];
			}else{
				$do="show";
			}
		}

		//
		$user=new User();
		$res=$user->loadByHash($sysController->getHash());		
		
		if ($res!=0){
			
			$ui=new GenericUI();
			$sysController->msg="<h3 style='margin-bottom:400px'>Solicita un link valido para participar o bien utiliza el que te fue entregado.</h3>";
			$sysController->ui=$ui;
			return;
		} 		

		$sysController->idApp=$user->idApp;

		if ($do=="show")
			$this->show($sysController->idApp);

	}

	//----------------
	
	function show($idApp){
	
		//echo "<br>showPlayers";

		global $sysController;
		
		//go
		$users=new Ranking();
		$users->load($sysController->idApp);
		
		$ui=new RankingUI();	
		$ui->data["user"]=new User();
		$ui->data["users"]=$users;
		
		$sysController->msg="<h1>Ranking</h1>";
		$sysController->ui=$ui;

	}
	
	
}
?>
