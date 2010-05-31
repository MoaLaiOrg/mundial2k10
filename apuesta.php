<?php
require_once('system/SysController.php');
require_once('apuesta/ApuestaMdl.php');

$sysController=new SysController();
$sysController->start();

$accion='view';
$idApuesta=0;

if (isset($_GET["accion"]) && ($_GET["accion"]=="view")) {
	if (isset($_GET["idApuesta"])){
		$idApuesta=$_GET["idApuesta"];
		$accion='view';
	}
}

showApuesta($idApuesta, $accion);

//----------------------

function showApuesta($idApuesta, $accion){

	//$isOwner=validaUsuarioApuesta($_SESSION["idUsuario"], $idApuesta);

	global $sysController;
	global $vwApuestaDetallePuntos;
 	global $vwApuestaDetalle;
 	global $vwPuntos;
	?>
	
	<form name="frmApuesta" action="abmApuestaLate.php" method="post">
		<input type="hidden" name="idApuesta" value="<?php echo $idApuesta?>">
		<input type="hidden" name="accion" value="update">

		<table width="100%" cellpadding="2" cellspacing="0" border="1">
			<tr>
				<td class="tdH" width="100px">fecha</td>
				<td class="tdH" width="150px">&nbsp;</td>
				<td class="tdH" width="150px">pais1</td>
				<td class="tdH" width="10px">apuesta</td>
				<td class="tdH" width="10px">final</td>
				<td class="tdH" width="10px">puntos</td>
				<td class="tdH" width="10px">final</td>
				<td class="tdH" width="10px">apuesta</td>
				<td class="tdH" width="150px">pais2</td>
				<td class="tdH" width="150px">&nbsp;</td>
				<td class="tdH" width="190px">quedan...</td>
			</tr>

			<?php 
			$query="select * from $vwApuestaDetallePuntos where idApuesta=" . $idApuesta . " order by fecha asc";
			$result=mysql_query($query) or die(mysql_error());
			$num=mysql_numrows($result);
			$i=0; $mkEdit=1;
			
			while ($i < $num) {

				$diaAnterior=$dia;
				$idPartido=mysql_result($result,$i,"idPartido");
				$fechaOriginal=mysql_result($result,$i,"fecha");
				
				$arr=explode(" ", $fechaOriginal); $dFecha = explode("-", $arr[0]);	$mes=$dFecha[1]; $dia=$dFecha[2];
				
				$fecha=$sysController->formatDayDateTime($fechaOriginal);
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
				?>

				<tr>
					
					<td class="td2">
						<?php echo $fecha?>
						<input class='searchBox' type="hidden" name='ronda[<?php echo $idPartido?>]' value='<?php echo $ronda?>'></input>
					</td>
					
					<td class="td1">
						<img src="imgs/flags/<?php echo $idEquipo1?>.gif"></img>
					</td>
					
					<td class="td1">
						<?php echo $nombre1?>
					</td>
					
					<td class="td2">
						<?php if ($mkEdit){?>
							<input class='searchBox' name='golesEquipo1[<?php echo $idPartido?>]' value='<?php echo $golesEquipo1[$idPartido]?>'></input>
						<?php }else{
							if ($mkView){?>
								<?php echo $golesEquipo1[$idPartido]?>
							<?php }
						}?>
					</td>
					
					<td class="td3">
						<?php echo $golesFinalEquipo1?>
					</td>
					
					<td class="td4">
						<b><?php echo $puntos?></b>
					</td>
					
					<td class="td3">
						<?php echo $golesFinalEquipo2?>
					</td>
					
					<td class="td2">
						<?php if ($mkEdit){?>
							<input class='searchBox' name='golesEquipo2[<?php echo $idPartido?>]' value='<?php echo $golesEquipo2[$idPartido]?>'></input>
						<?php }else{
							if ($mkView){?>
								<?php echo $golesEquipo2[$idPartido]?>
							<?php }
						}?>
					</td>
					
					<td class="td1">
						<?php echo $nombre2?>
					</td>
					
					<td class="td1">
						<img src="imgs/flags/<?php echo $idEquipo2?>.gif"></img>
					</td>
					
					<td class="td2" style="border-left:1px solid gray" valign="bottom" align="center" width="190px">
						<?php if ($mkCoke==1){?><img src="imgs/coke.gif" style="border:1px solid gray"></img><?php }?>
						<?php if ($mkBazan==1){?><img src="imgs/bazanSmall.gif" style="border:1px solid gray"></img><?php }?>
						<?php if ($mkVieja==1){?><img src="imgs/vieja.gif" style="border:1px solid gray"></img><?php }?>
						<?php if ($mkMotoraton==1){?><img src="imgs/motoraton.gif" style="border:1px solid gray"></img><?php }?>
						<?php if ($mkExcellent>=1){?><img src="imgs/excellent.gif" style="border:1px solid gray"></img><?php }?>
						<?php if ($mkAmargo>=1){?><img src="imgs/amargo.gif" style="border:1px solid gray"></img><?php }?>
						<?php if ($mkUsa>=1){?><img src="imgs/usa.gif" style="border:1px solid gray"></img><?php }?>
						<?php if ($mkHyena>=1){?><img src="imgs/hyena.gif" style="border:1px solid gray"></img><?php }?>
					</td>					
				</tr>
			<?php
			$i++;
			}
		?>
		</table>
	</form>
<?php
}?>


<?php
	$sysController->end();
?>