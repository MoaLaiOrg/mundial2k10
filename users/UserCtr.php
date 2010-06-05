<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/users/UserMdl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sites/mundial2k10/users/UserUI.php');
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
		
		//admin?
		if (isset($_GET["hash"])){
			$hash=$_GET["hash"];		
		}
		
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
			$this->addUser();
			
		if ($do=="newUser")
			$this->newUser();	

	}
	
	//----------------
	
	function newUser(){

		global $sysController;
		
		if (isset($_GET["hash"])){$hash=$_GET["hash"];}		
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
	
	function addUser(){
		
		global $sysController;
		
		if (isset($_POST["username"])){
			$username=$_POST["username"];
		}else{
			echo "<br>username?";
			exit(); 
		}
		
		if (isset($_GET["hash"])){
			$hash=$_GET["hash"];		
		}
		
		$sysController->msg="<h1>Control de usuarios</h1>";
		
		$user=new User();
		$user->add($username, $hash);
		$users=new Users();
		$users->load($hash);

		$ui=new UserUI();
		$ui->data["user"]=$user;
		$ui->data["users"]=$users;
		
		$sysController->ui=$ui;

	}	
	
}
?>
