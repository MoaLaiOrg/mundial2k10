<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/users/UserMdl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/users/UserUI.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/users/UserPublicUI.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/users/UserPublicCoolirisUI.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/users/UserMdl.php');

class UserCtr
{

	function UserCtr(){

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
				$do="newUser";
			}
		}
		
		$hash="";
		if (isset($_GET["hash"])){$hash=$_GET["hash"];}		
		if ($do=="showPlayers"){$hash="milanesa";}
		
		//admin?
		if ($hash!="elhombredelacararoja" && $hash!="milanesa"){
			echo "<br>invalid admin";
			exit(); 
		}

		if ($hash=="elhombredelacararoja"){$hash="epson";}
		if ($hash=="milanesa"){$hash="egel";}

		$sysController->hash=$hash;	
		$sysController->idApp=$hash;	

		//echo "<br>--" . $sysController->idApp;
		if ($do=="adduser")
			$this->addUser($sysController->hash);
			
		if ($do=="newUser")
			$this->newUser($sysController->hash);
		
		if ($do=="showPlayers")
			$this->showPlayers($sysController->hash);	

	}
	
	//----------------
	
	function newUser($hash){

		global $sysController;
		
		$tbEstado=null;
		if (isset($_GET["tbEstado"])){$tbEstado=$_GET["tbEstado"];}
		
		//go
		$users=new Users();
		$users->load($hash, $tbEstado);
		
		$ui=new UserUI();
		$ui->data["user"]=new User();
		$ui->data["users"]=$users;

		$sysController->msg="<h1>Control de usuarios</h1>";
		$sysController->ui=$ui;

	}
	
	//----------------
	
	function showPlayers($hash){
	
		//echo "<br>showPlayers";

		global $sysController;
		
		//go
		$users=new Users();
		$users->load("egel", "C");
		
		$ui=new UserPublicUI();		
		$ui->data["user"]=new User();
		$ui->data["users"]=$users;
		
		$sysController->msg="<h1>Estan jugando!</h1>";
		$sysController->ui=$ui;

	}
	
	//----------------
	
	function addUser($hash){
		
		global $sysController;
		
		if (isset($_POST["username"])){
			$username=$_POST["username"];
		}else{
			echo "<br>username?";
			exit(); 
		}
		
		$sysController->msg="<h1>Control de usuarios</h1>";
		
		$user=new User();
		$user->add($username, $hash);
		$users=new Users();
		$users->load($hash, null);

		$ui=new UserUI();
		$ui->data["user"]=$user;
		$ui->data["users"]=$users;
		
		$sysController->ui=$ui;

	}	
	
}
?>
