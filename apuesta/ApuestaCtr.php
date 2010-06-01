<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/apuesta/ApuestaMdl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/apuesta/ApuestaUI.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/system/GenericUI.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/apuesta/UserMdl.php');

class ApuestaCtr
{

	function ApuestaCtr(){

	}
	
	//----------------
	
	function control(){
	
		if (isset($_POST["do"])){
			$do=$_POST["do"];
		}else{
			if (isset($_GET["do"])){
				$do=$_GET["do"];
			}else{
				$do="fixture";
			}
		}
		
		//echo "<br>--" . $do;
		
		if ($do=="fixture")
			$this->fixture();
			
		if ($do=="edit")
			$this->editApuesta();
			
		if ($do=="view")
			$this->viewApuesta();

		if ($do=="save")
			$this->saveApuesta();

	}
	
	//----------------
	
	function fixture(){
		
		global $sysController;
		
		if (isset($_GET["hash"])){
			$hash=$_GET["hash"];		
		}
		
		$user=new User();
		$res=$user->loadByHash($hash);
		
		if ($res!=0){
			
			$ui=new GenericUI();
			$sysController->msg="<h3 style='margin-bottom:400px'>Solicita un link valido para participar o bien utiliza el que te fue entregado.</h3>";
			$sysController->ui=$ui;	
			return;
			
		}

		$sysController->hash=$hash;
		$sysController->idApp=$user->idApp;
		$sysController->msg="<h1>Fixture</h1>";
	
		$apuesta=new Apuesta();
		$apuesta->loadByUsername("fixture");
		$apuesta->modFixture=" style='display:none' ";
		
		$ui=new ApuestaUI();
		$ui->data=$apuesta;
		$sysController->ui=$ui;

	}
	
	//----------------
	
	function editApuesta(){
		
		global $sysController;
		
		if (isset($_GET["hash"])){
			$hash=$_GET["hash"];		
		}
		
		$user=new User();
		$res=$user->loadByHash($hash);
		
		if ($res!=0){
			
			$ui=new GenericUI();
			$sysController->msg="<h3 style='margin-bottom:400px'>Solicita un link valido para participar o bien utiliza el que te fue entregado.</h3>";
			$sysController->ui=$ui;
			return;
		} 
		
		$sysController->hash=$hash;
		$sysController->idApp=$user->idApp;
		
		$apuesta=new Apuesta();
		$apuesta->hash=$hash;
		$apuesta->loadByUsername($user->username);
		$apuesta->modApuesta=" style='display:none' ";
		
		//tbEstado check
		if ($apuesta->tbEstado=="C"){
		
			$ui=new GenericUI();
			$sysController->msg="<h3 style='margin-bottom:400px'>La apuesta esta Cerrada.<br>Espere al comienzo del torneo.</h3>";
			$sysController->ui=$ui;	
			
		} else {
				
			$ui=new ApuestaUI();
			$ui->data=$apuesta;
			$sysController->msg="<h1>Apuesta - Bienvenido " . $apuesta->username . "!!</h1><br>
								Una vez que guardes la apuesta no podes modificarla. El torneo empieza un dia antes del mundial. En ese momento se publicara ranking y anotados.";
			$sysController->ui=$ui;
		}
	}
	
	//----------------
	
	function viewApuesta(){
		
		echo "<br>--viewApuesta";
		$apuesta=new Apuesta();
		
		if (isset($_GET["username"])){
			$username=$_GET["username"];
		}else{
			echo "<br>username?";
			exit(); 
		}
		
		$apuesta->loadByUsername($username);
		$apuesta->modViewFixture=" style='display:none' ";
		
		//
		$ui=new ApuestaUI();		
		$ui->showApuesta($apuesta);

	}
	
	//----------------
	
	function saveApuesta(){
		
		//echo "<br>--saveApuesta";
		
		global $sysController;
		
		if (isset($_POST["hash"])){
			$hash=$_POST["hash"];
		}else{
			echo "<br>hash?";
			exit(); 
		}

		//hash check
		$user=new User();
		$res=$user->loadByHash($hash);
		if ($res!=0){
			echo "<br>Invalid hash";
			exit(); 
		}
		
		//save
		$apuesta=new Apuesta();
		$apuesta->hash=$hash;
		$res=$apuesta->loadByUsername($user->username);
		
		$arrParam=array();		
		foreach ($_POST["golesEquipo1"] as $key => $value){

			$golesEquipo1=$_POST["golesEquipo1"][$key]; 
			$golesEquipo2=$_POST["golesEquipo2"][$key]; 
			$idPartido=$key;
			
			$arrParam[]=array("idPartido" => $key, 
				"golesEquipo1" => $_POST["golesEquipo1"][$key], 
				"golesEquipo2" => $_POST["golesEquipo2"][$key]);
			
		}
		
		if ($apuesta->tbEstado!="C"){ //control de closed
			$res=$apuesta->save($arrParam);
		}
		
		$this->editApuesta(); //esto pq no tengo sysMessage de session

	}

}
?>
