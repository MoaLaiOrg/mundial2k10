<?php

include 'utiles.php';
//login();

if (isset($_POST["accion"]) && ($_POST["accion"]=="update")) {

	$idApuesta=$_POST["idApuesta"];
	$isOwner=validaUsuarioApuesta($_SESSION["idUsuario"], $idApuesta);	
	if (!$isOwner)
		header("location:login.php");
	
	//procesa submit
	$arr=$_POST["golesEquipo1"];
	foreach ($arr as $key => $value){

		$idPartido=$key;
		$golesEquipo1=$_POST["golesEquipo1"][$key]; if($golesEquipo1==NULL)$golesEquipo1="null";
		$golesEquipo2=$_POST["golesEquipo2"][$key]; if($golesEquipo2==NULL)$golesEquipo2="null";
		$ronda=$_POST["ronda"][$key];

		$mkEdit=validaRonda($idPartido, $_SESSION["rondaCorte"]);		
		if ($mkEdit){
			$sql="update apuestadetalle set golesEquipo1=$golesEquipo1, golesEquipo2=$golesEquipo2 where idApuesta=$idApuesta and idPartido=$idPartido";
			//echo "<br>" . $sql;
			mysql_query($sql) or die("Mal - Revisa la data q ingresas y proba de nuevo ok.");
		}
	}
	//header("location:listaApuesta.php?accion=modi");
	header("location:abmApuestaLate.php?idApuesta="	. $idApuesta . "&accion=modi");

}

myHeader();
$accion='view';
$idApuesta=0;

if (isset($_GET["accion"]) && ($_GET["accion"]=="modi")) {
	if (isset($_GET["idApuesta"])){
		$idApuesta=$_GET["idApuesta"];
		$accion='modi';
	}
}

if (isset($_GET["accion"]) && ($_GET["accion"]=="view")) {
	if (isset($_GET["idApuesta"])){
		$idApuesta=$_GET["idApuesta"];
		$accion='view';
	}
}

muestraApuesta($idApuesta, $accion);	

function muestraApuesta($idApuesta, $accion){

	$isOwner=validaUsuarioApuesta($_SESSION["idUsuario"], $idApuesta);

	global $vwApuestaDetallePuntos;
 	global $vwApuestaDetalle;
 	global $vwPuntos;

	?><form name="frmApuesta" action="abmApuestaLate.php" method="post">
	<input type=hidden name="idApuesta" value="<?php echo $idApuesta?>">
	<input type=hidden name=accion value="update">

	<table border=0 cellpadding=0 cellspacing=0 width=700px>
		<tr height=30px><td class=tdT>Detalle Apuesta</td><tr>
		<tr>
			<td width=100%>
				<table width=100% cellpadding=2 cellspacing=0 border=0>
		<tr>
			<td class=tdH width="50px">&nbsp;</td>
			<td class=tdH width="100px">fecha</td>
			<td class=tdH width="150px">&nbsp;</td>
			<td class=tdH width="150px">pais1</td>
			<td class=tdH width="10px">apuesta</td>
			<td class=tdH width="10px">final</td>
			<td class=tdH width="10px">puntos</td>
			<td class=tdH width="10px">final</td>
			<td class=tdH width="10px">apuesta</td>
			<td class=tdH width="150px">pais2</td>
			<td class=tdH width="150px">&nbsp;</td>
			<td class=tdH width="190px">quedan...</td>
		</tr>

		<?php 

	$query="select * from $vwApuestaDetallePuntos where idApuesta=" . $idApuesta . " order by fecha asc";
	$result=mysql_query($query) or die(mysql_error());
	$num=mysql_numrows($result);
	$i=0;
	$mkEdit=1;
	while ($i < $num) {

		$diaAnterior=$dia;
		$idPartido=mysql_result($result,$i,"idPartido");
		$fechaOriginal=mysql_result($result,$i,"fecha");
		
		$arr=explode(" ", $fechaOriginal); $dFecha = explode("-", $arr[0]);	$mes=$dFecha[1]; $dia=$dFecha[2];
		
		$fecha=formatoDateTime($fechaOriginal);
		$idEquipo1=mysql_result($result,$i,"idEquipo1");
		$idEquipo2=mysql_result($result,$i,"idEquipo2");
		$nombre1=mysql_result($result,$i,"nombre1");
		$nombre2=mysql_result($result,$i,"nombre2");
		$golesEquipo1[$idPartido]=mysql_result($result,$i,"golesEquipo1");
		$golesEquipo2[$idPartido]=mysql_result($result,$i,"golesEquipo2");
		$golesFinalEquipo1=mysql_result($result,$i,"golesFinalEquipo1");
		$golesFinalEquipo2=mysql_result($result,$i,"golesFinalEquipo2");
		$puntos=mysql_result($result,$i,"puntos") + mysql_result($result,$i,"puntosXP");
		$tbEvento=mysql_result($result,$i,"tbEvento");
		$mkCoke=mysql_result($result,$i,"mkCoke");
		$mkBazan=mysql_result($result,$i,"mkBazan");
		$mkVieja=mysql_result($result,$i,"mkVieja");
		$mkMotoraton=mysql_result($result,$i,"mkMotoraton");
		$mkExcellent=mysql_result($result,$i,"mkExcellent");
		$mkAmargo=mysql_result($result,$i,"mkAmargo");
		$mkUsa=mysql_result($result,$i,"mkUsa");
		$mkHyena=mysql_result($result,$i,"mkHyena");

		$mkEdit=($ronda>$_SESSION["rondaCorte"]);

		if ($isOwner){
			$mkView=true;
		} else {
			$mkView=!$mkEdit;
			$mkEdit=false;
		}

		$salto="";
		if ($diaAnterior!=$dia){?>
			<tr>
				<td class=td4 align=center colspan=11 valign=bottom width="10px" style="padding-top:30px"><b><?php echo $ronda?></b></td>
			</tr>
		<?php }?>

		<tr>
			<td class=td1 width="50px"><img src="imgs/flags/dp<?php echo $tbEvento?>.gif" ></img></td>
			<td class=td2 valign=bottom style="border-right:1px solid gray" width="200px"><?php echo $fecha?>
				<input class='searchBox' type="hidden" name='ronda[<?php echo $idPartido?>]' value='<?php echo $ronda?>'></input>
			</td>

			<td valign=bottom class=td1 width="150px"><img style="border:1px solid gray" src="imgs/flags/<?php echo $idEquipo1?>.png"></img></td>
			<td valign=bottom class=td1 width="150px"><?php echo $nombre1?></td>
			<td class=td2 valign=bottom width="10px" align=center>
				<?php if ($mkEdit){?>
					<input class='searchBox' style='width:20px; height:14px' name='golesEquipo1[<?php echo $idPartido?>]' value='<?php echo $golesEquipo1[$idPartido]?>'></input>
				<?php }else{
					if ($mkView){?>
						<?=$golesEquipo1[$idPartido]?>
					<?php }
				}?>&nbsp;
			</td>
			<td class=td3 valign=bottom width="10px" align=center>&nbsp;<?php echo $golesFinalEquipo1?></td>
			<td class=td4 valign=bottom width="10px" align=center><b><?php echo $puntos?></b>&nbsp;</td>
			<td class=td3 valign=bottom width="10px" align=center>&nbsp;<?php echo $golesFinalEquipo2?></td>
			<td class=td2 valign=bottom width="10px" align=center>
				<?php if ($mkEdit){?>
					<input class='searchBox' style='width:20px; height:14px' name='golesEquipo2[<?php echo $idPartido?>]' value='<?php echo $golesEquipo2[$idPartido]?>'></input>
				<?php }else{
					if ($mkView){?>
						<?=$golesEquipo2[$idPartido]?>
					<?php }
				}?>&nbsp;
			</td>
			<td valign=bottom class=td1 width="150px" align=right><?php echo $nombre2?></td>
			<td valign=bottom class=td1 width="150px" align=right><img style="border:1px solid gray" src="imgs/flags/<?php echo $idEquipo2?>.png" ></img></td>
			<td class=td2 style="border-left:1px solid gray" valign=bottom align=center width="190px">
				<?php if ($mkCoke==1){?><img src="imgs/coke.gif" style="border:1px solid gray"></img><?php }?>
				<?php if ($mkBazan==1){?><img src="imgs/bazanSmall.gif" style="border:1px solid gray"></img><?php }?>
				<?php if ($mkVieja==1){?><img src="imgs/vieja.gif" style="border:1px solid gray"></img><?php }?>
				<?php if ($mkMotoraton==1){?><img src="imgs/motoraton.gif" style="border:1px solid gray"></img><?php }?>
				<?php if ($mkExcellent>=1){?><img src="imgs/excellent.gif" style="border:1px solid gray"></img><?php }?>
				<?php if ($mkAmargo>=1){?><img src="imgs/amargo.gif" style="border:1px solid gray"></img><?php }?>
				<?php if ($mkUsa>=1){?><img src="imgs/usa.gif" style="border:1px solid gray"></img><?php }?>
				<?php if ($mkHyena>=1){?><img src="imgs/hyena.gif" style="border:1px solid gray"></img><?php }?>
				&nbsp;
			</td>
			
		</tr>
<?php
	$i++;
	}

	?>
	</table></td></tr>
	<tr><td class=tdT colspan=1 align=right><input value="Guardar Cambios" type=submit></td><tr>
	</table>

	</form><?php

}?>



<?php
myFooter();
?>


