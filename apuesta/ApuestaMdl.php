<?php

class Apuesta
{

	public $partidos;
	public $idApuesta;
	public $username;
	public $tbEstado;	
	public $modFixture;
	public $modApuesta;
		
	function Apuesta(){
		$this->partidos=array();
		$this->idApuesta=-1;
		$this->modFixture="";
		$this->modApuesta="";
		$this->tbEstado=null;
		
		//$this->load();
	}
	
	//----------------
		
	function save($arrData){
	
		global $sysController;
		//print_r ($arrData);
		
		foreach ($arrData as $key => $item){

			$idPartido=$item["idPartido"];
			$golesEquipo1=$item["golesEquipo1"];
			$golesEquipo2=$item["golesEquipo2"];
			
			if ($golesEquipo1==NULL) $golesEquipo1="null";
			if ($golesEquipo2==NULL) $golesEquipo2="null";

			$sql="update apuestadetalle set golesEquipo1=$golesEquipo1, golesEquipo2=$golesEquipo2 
					where idApuesta=" . $this->idApuesta . " and idPartido=$idPartido";
			//echo "<br>" . $sql;
			$result=mysql_query($sql);
		}
		
		$sql="update apuesta set tbEstado='C' where idApuesta=" . $this->idApuesta ;
		//echo "<br>" . $sql;
		$result=mysql_query($sql);
		
		$sysController->msg=
				"<span class='msg'>La apuesta se ingreso con exito</span>";
	
	}
	
	//----------------
	
	function loadByUsername($username){
	
		global $vwApuestaDetallePuntos;
		global $sysController;
		
		$query="select * from apuesta a 
					inner join usuario u 
						on a.idUsuario=u.idUsuario 
				where u.nombre='" . $username . "'";
		//echo "<br>--" . $query;
		$result=mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);		
		if ($num==0){return -1;}
		
		$this->username=$username;
		$this->idApuesta=mysql_result($result, 0, "idApuesta");
		$this->tbEstado=mysql_result($result, 0, "tbEstado");
		
		//detalle
		$query="select * from vwApuestaDetallePuntos where idApuesta=" 
		//$query="select * from vwApuestaDetallePuntosSrc where idApuesta=" 
			. $this->idApuesta . " order by fecha asc";
		//echo "<br>--" . $query;	
		$result=mysql_query($query) or die(mysql_error());
		$num=mysql_numrows($result);		
		if ($num==0){
			echo "<br>No se encontro la apuesta";
			exit(); 
		}
		
		$i=0;
		$fechaAnterior="x";
		while ($i < $num) {
		
			$aux=new ApuestaItem();
			$aux->idPartido=mysql_result($result,$i,"idPartido");
			$aux->fechaOriginal=mysql_result($result,$i,"fecha");
			$aux->fecha=$sysController->formatDayDateTime($aux->fechaOriginal);
			$aux->idEquipo1=mysql_result($result,$i,"idEquipo1");
			$aux->idEquipo2=mysql_result($result,$i,"idEquipo2");
			$aux->nombre1=mysql_result($result,$i,"nombre1");
			$aux->nombre2=mysql_result($result,$i,"nombre2");
			$aux->golesEquipo1=mysql_result($result,$i,"golesEquipo1");
			$aux->golesEquipo2=mysql_result($result,$i,"golesEquipo2");
			$aux->golesFinalEquipo1=mysql_result($result,$i,"golesFinalEquipo1");
			$aux->golesFinalEquipo2=mysql_result($result,$i,"golesFinalEquipo2");
			$aux->puntos=mysql_result($result,$i,"puntosPower");
			$aux->tbEvento=mysql_result($result,$i,"tbEvento");
			$aux->mkCoke=mysql_result($result,$i,"mkCoke");
			$aux->mkBazan=mysql_result($result,$i,"mkBazan");
			$aux->mkVieja=mysql_result($result,$i,"mkVieja");
			$aux->mkMotoraton=mysql_result($result,$i,"mkMotoraton");
			$aux->mkExcellent=mysql_result($result,$i,"mkExcellent");
			$aux->mkAmargo=mysql_result($result,$i,"mkAmargo");
			$aux->mkUsa=mysql_result($result,$i,"mkUsa");
			$aux->mkHyena=mysql_result($result,$i,"mkHyena");
			$aux->mkTriste=mysql_result($result,$i,"mkTriste");
			
			//control
			if ($aux->golesFinalEquipo1==null)
				$aux->golesFinalEquipo1="-";
				
			if ($aux->golesFinalEquipo2==null)
				$aux->golesFinalEquipo2="-";
			
			if ($fechaAnterior!=$sysController->formatShortDate($aux->fechaOriginal)){
				$aux->modNuevaFecha="<tr><td colspan='9' style='border-top:1px solid silver;'>&nbsp;</td></tr>";
			}
					
			$fechaAnterior=$sysController->formatShortDate($aux->fechaOriginal);			
			$this->partidos[]=$aux;
			$i++;
		}
	}	
}

//----------------

class ApuestaItem
{	

	function ApuestaItem(){

		$this->idPartido=null;
		$this->fecha=null;
		$this->idEquipo1=null;
		$this->idEquipo2=null;
		$this->nombre1=null;
		$this->nombre2=null;
		$this->golesEquipo1=null;
		$this->golesEquipo2=null;
		$this->golesFinalEquipo1=null;
		$this->golesFinalEquipo2=null;
		$this->puntos=null;
		$this->tbEvento=null;
		$this->mkCoke=null;
		$this->mkBazan=null;
		$this->mkVieja=null;
		$this->mkExcellent=null;
		$this->mkAmargo=null;
		$this->mkHyena=null;
		$this->mkTriste=null;
		
		$this->modNuevaFecha="";
	}
}
?>
