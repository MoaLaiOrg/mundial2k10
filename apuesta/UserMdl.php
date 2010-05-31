<?php

class User
{

	public $username;

	function User(){
	}
	
	//----------------
		
	function loadByHash($hash){
	
		//username
		$query="select * from usuario u where u.hash='" . $hash . "'";
		//echo "<br>--" . $query;
		$result=mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);		
		if ($num==0){return -1;}
		
		$this->username=mysql_result($result, $i, "nombre");
		$this->hash=mysql_result($result, $i, "hash");
	
	}
	
}
?>
