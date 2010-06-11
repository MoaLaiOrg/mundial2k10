<?php

class RankingUser
{

	public $username;
	public $total;
	public $order;
	public $img;
		
	function RankingUser(){
		$this->username=null;
		$this->total=null;
		$this->order=null;
		$this->img="";
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

		$query="select * from vwRanking where idApp='$idApp'";
		//echo "<br>--" . $query;
		$result=mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);
		
		$i=0; $totalAnterior=""; $order=1;
		while ($i < $num) {
			
			$aux=new RankingUser(); 
			$aux->username=mysql_result($result, $i, "nombre");			
			$aux->total=mysql_result($result, $i, "total");
			$aux->order=$order;
			
			if ($aux->order==1){$aux->img="<img src='imgs/rank1.gif'/>"; }
			if ($aux->order==2){$aux->img="<img src='imgs/rank2.gif'/>"; }
			if ($aux->order==3){$aux->img="<img src='imgs/rank3.gif'/>"; }
			
			$this->list[]=$aux;			
			$i++;
			
			if ($totalAnterior!=$aux->total){$order=$order+1;}
			$totalAnterior=$aux->total;
		}
		//print_r ($this->list);		
		return 0;
	}

}

?>
