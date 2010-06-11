<?php

class RankingUser
{

	public $username;
	public $total;
		
	function RankingUser(){
		$this->username=null;
		$this->total=null;
	}

}	

//----------------

class Ranking
{

	public $list;
		
	function Ranking(){
		$this->list=array();
	}
	
	//----------------
	
	function load($idApp){
	
		$idApp='egel';

		$query="select * from vwRanking where idApp='$idApp'";
		//echo "<br>--" . $query;
		$result=mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);
		
		$i=0;
		while ($i < $num) {
			
			$aux=new RankingUser(); 
			$aux->username=mysql_result($result, $i, "nombre");			
			$aux->total=mysql_result($result, $i, "total");

			$this->list[]=$aux;
			$i++;
		}
		//print_r ($this->list);		
		return 0;
	}

}

?>
