<?

include 'utiles.php';
login();

if ($_SESSION["nombre"]!="mporto")
		header("location:login.php");

if (isset($_POST["accion"]) && ($_POST["accion"]=="update")) {

	//procesa submit
	$arr=$_POST["golesEquipo1"];

	foreach ($arr as $key => $value){

		$idPartido=$key;
		$golesEquipo1=$_POST["golesEquipo1"][$key]; if($golesEquipo1==NULL)$golesEquipo1="null";
		$golesEquipo2=$_POST["golesEquipo2"][$key]; if($golesEquipo2==NULL)$golesEquipo2="null";
		$ronda=$_POST["ronda"][$key];
	
		$sql="update partido set golesEquipo1=$golesEquipo1, golesEquipo2=$golesEquipo2 where idPartido=$idPartido";
		//echo "<br>" . $sql;
		mysql_query($sql) or die("Mal - Revisa la data q ingresas y proba de nuevo ok.");
	
	}

	header("location:abmResultados.php?idApuesta="	. $idApuesta . "&accion=modi");

}

myHeader();

muestraApuesta($_GET["idApuesta"],'modi');	

function muestraApuesta($idApuesta, $accion){

 	global $vwPartido;

	?><form name="frmApuesta" action="abmResultados.php" method="post">
	<input type=hidden name="idApuesta" value="<?=$idApuesta?>">
	<input type=hidden name=accion value="update">

	<table border=0 cellpadding=0 cellspacing=0 width=700px>
		<tr height=30px><td class=tdT colspan=1>Detalle Apuesta</td><tr>
		<tr>
			<td width=100%>
				<table width=100% cellpadding=2 cellspacing=0 border=0>
		<tr>
			<td class=tdH width="100px">fecha</td>
			<td class=tdH width="150px">pais1</td>
			<td class=tdH width="30px">final</td>
			<td class=tdH width="10px">puntos</td>
			<td class=tdH width="30px">final</td>
			<td class=tdH width="150px">pais2</td>
			<td class=tdH width="50px">&nbsp;</td>
			<td class=tdH width="190px">quedan...</td>
		</tr>

		<?

	//$query="select * from $vwApuestaDetallePuntos where idApuesta=" . $idApuesta . " order by ronda asc, fecha asc";
	$query="select * from $vwPartido order by ronda asc, idPartido asc";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_numrows($result);
	$i=0;

	while ($i < $num) {

		$rondaAnterior=$ronda;
		$idPartido=mysql_result($result,$i,"idPartido");
		$fechaOriginal=mysql_result($result,$i,"fecha");
		$fecha=formatoDateTime($fechaOriginal);
		$ronda=mysql_result($result,$i,"ronda");
		$nombre1=mysql_result($result,$i,"nombre1");
		$nombre2=mysql_result($result,$i,"nombre2");
		$apodo1=mysql_result($result,$i,"apodo1");
		$apodo2=mysql_result($result,$i,"apodo2");
		$golesEquipo1[$idPartido]=mysql_result($result,$i,"golesEquipo1");
		$golesEquipo2[$idPartido]=mysql_result($result,$i,"golesEquipo2");

		$salto="";
		if ($rondaAnterior!=$ronda){?>
			<tr>
				<td class=td4 align=center colspan=11 valign=bottom width="10px" style="padding-top:30px"><b>FECHA <?=$ronda?></b></td>
			</tr>
		<?}?>

		<tr>
			<td class=tdH valign=bottom width="200px"><b>FECHA <?=$ronda?></b>
				<input class='searchBox' type="hidden" name='ronda[<?=$idPartido?>]' value='<?=$ronda?>'></input>			
			</td>

			<td valign=bottom class=td1 width="150px"><img src="imgs/teams/small/<?=$apodo1?>.gif"  height="15px" width="15px"></img>&nbsp;<?=$nombre1?></td>
			<td class=td2 valign=bottom width="20px" align=center>
				<input class='searchBox' style='width:20px; height:14px' name='golesEquipo1[<?=$idPartido?>]' value='<?=$golesEquipo1[$idPartido]?>'></input>
			</td>
			<td class=td4 valign=bottom width="10px" align=center><b><?=$puntos?></b>&nbsp;</td>			
			<td class=td2 valign=bottom width="20px" align=center>
				<input class='searchBox' style='width:20px; height:14px' name='golesEquipo2[<?=$idPartido?>]' value='<?=$golesEquipo2[$idPartido]?>'></input>
			</td>
			<td valign=bottom class=td1 width="150px" align=right><?=$nombre2?>&nbsp;<img src="imgs/teams/small/<?=$apodo2?>.gif" height="15px" width="15px" ></img></td>
			<td class=td1 width="50px">&nbsp;</td>
			
		</tr>
<?
	$i++;
	}

	?>
	</table></td></tr>
	<tr><td class=tdT colspan=1 align=right><input value="Guardar Cambios" type=submit></td><tr>
	</table>

	</form><?

}?>



<?
myFooter();
?>


