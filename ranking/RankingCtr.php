<?php
require_once('c:/wamp/www/sites/mundial2k10/' . '/ranking/RankingMdl.php');
require_once('c:/wamp/www/sites/mundial2k10/' . '/ranking/ApuestaUI.php');

class RankingCtr
{

	function RankingCtr(){

	}
	
	//----------------
	
	function control(){
	
		if (isset($_POST["do"])){
			$do=$_POST["do"];
		}else{
			if (isset($_GET["do"])){
				$do=$_GET["do"];
			}else{
				$do="show";
			}
		}
		
		//echo "<br>--" . $do;
		
		if ($do=="show")
			$this->show();

	}
	
	//----------------
	
	function show(){
		
		global $sysController;
	
		$ranking=new Ranking();
		$ranking->load();
				
		$ui=new RankingUI();
		$ui->data=$ranking;
		$sysController->ui=$ui;

	}
	
}
?>
