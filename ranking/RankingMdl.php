<?php

class RankingUser
{

	public $username;
	public $total;
	public $order;
	public $img;
	public $powerUps;
		
	function RankingUser(){
		$this->username=null;
		$this->total=null;
		$this->order=null;
		$this->img="";
		$this->powerUps="";
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
		
		$i=0; 
		$totalAnterior=mysql_result($result, 0, "total");; 
		$order=1;
		while ($i < $num) {
			
			$aux=new RankingUser(); 
			$aux->username=mysql_result($result, $i, "nombre");			
			$aux->total=mysql_result($result, $i, "total");
			
			for ($j = 1; $j <= mysql_result($result, $i, "qCoke"); $j++) {
				$aux->powerUps.="<img src='imgs/coke.gif'/>";
			}		
			for ($j = 1; $j <= mysql_result($result, $i, "qBazan"); $j++) {
				$aux->powerUps.="<img src='imgs/bazanSmall.gif'/>";
			}
			for ($j = 1; $j <= mysql_result($result, $i, "qViejaBuena"); $j++) {
				$aux->powerUps.="<img src='imgs/vieja.gif'/>";
			}
			for ($j = 1; $j <= mysql_result($result, $i, "qViejaMala"); $j++) {
				$aux->powerUps.="<img src='imgs/vieja.gif'/>";
			}
			for ($j = 1; $j <= mysql_result($result, $i, "qMotoraton"); $j++) {
				$aux->powerUps.="<img src='imgs/motoraton.gif'/>";
			}
			/*
			$aux->powerUps=mysql_result($result, $i, "qBazan")
				. mysql_result($result, $i, "qCoke")
				. mysql_result($result, $i, "qViejaBuena")
				. mysql_result($result, $i, "qViejaMala")
				. mysql_result($result, $i, "qMotoraton")
			;
			*/
			
			if ($totalAnterior!=$aux->total){$order=$order+1;}
			$aux->order=$order;
			
			if ($aux->order==1){$aux->img="<img src='imgs/rank1.gif'/>"; }
			if ($aux->order==2){$aux->img="<img src='imgs/rank2.gif'/>"; }
			if ($aux->order==3){$aux->img="<img src='imgs/rank3.gif'/>"; }
			
			
			
			$this->list[]=$aux;			
			$i++;
			
			$totalAnterior=$aux->total;
		}
		
		$lastRank=$order;
		
		//
		$i=0; 
		foreach ($this->list as $item){			
			if ($item->order==$lastRank){$item->img="<img src='imgs/lastRank.gif'/>"; }
		}
		
		
		//print_r ($this->list);		
		return 0;
	}

}

?>
