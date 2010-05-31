<?php
require_once('system/SysController.php');
$sysController=new SysController();
$sysController->start();
?>

<table border=0 cellpadding=2 cellspacing=0>
	<tr>
		<td class="tdT" colspan=6>Fixture</td>
	</tr>
	<tr>
		<td class="tdH">fecha</td>
		<td class="tdH">pais1</td>
		<td class="tdH">final</td>
		<td class="tdH">final</td>
		<td class="tdH">pais2</td>
		<td class="tdH">powerUps</td>
	</tr>

<?php 

$query="select * from $vwPartido order by ronda asc";
echo $query;
$result=mysql_query($query);
$num=mysql_numrows($result);
$i=0;
$ronda=0;

while ($i < $num) {

	$fecha=mysql_result($result,$i,"fecha");
	$fecha=$sysController->formatDateTime($fecha);
	$nombre1=mysql_result($result,$i,"nombre1");
	$golesEquipo1=mysql_result($result,$i,"golesEquipo1");
	$apodo1=mysql_result($result,$i,"apodo1");
	$nombre2=mysql_result($result,$i,"nombre2");
	$golesEquipo2=mysql_result($result,$i,"golesEquipo2");
	$apodo2=mysql_result($result,$i,"apodo2");
	$mkBazan=mysql_result($result,$i,"mkBazan");

	if ($ronda!=mysql_result($result,$i,"ronda")){?>
		<tr>
			<td class="td4" colspan=6><br>
				<b>FECHA&nbsp;<?php echo $ronda+1?></b>
			</td>
		</tr>
	<?php }
	$ronda=mysql_result($result, $i, "ronda");
	?>

	<tr>
		<td class="td4">
			<?php echo $fecha?>
		</td>
		<td class="td1" width="150px">
			<img src="imgs/teams/small/<?php echo$apodo1?>.gif" width="15px"></img>&nbsp;
			<?php echo $nombre1?>
		</td>
		<td class="td3">
			<b><?php echo $golesEquipo1?></b>&nbsp;
		</td>
		<td class="td3">
			<b><?php echo $golesEquipo2?></b>&nbsp;
		</td>
		<td class="td1" width="150px">
			<?php echo $nombre2?>&nbsp;
			<img src="imgs/teams/small/<?=$apodo2?>.gif" height="15px" width="15px"></img>
		</td>
		<td class="td4">
			<?php if ($mkClasico){?><img src="imgs/l1.gif"></img><?php }?>
			<?php if ($mkClasicoBarrio){?><img src="imgs/l2.gif"></img><?php }?>
			<?php if ($mkSuperClasico){?><img src="imgs/l3.gif"></img><?php }?>
			<?php if ($mkSos){?><img src="imgs/eyemouth.gif"></img><?php }?>
			<?php if ($mkBazan){?><img src="imgs/bazanSmall.gif"></img><?php }?>
			&nbsp;
		</td>
	</tr>
	<?php 
$i++;
}
?>

</table>
<br>

<?php 
	$colVideos = array ();
	array_push($colVideos, "h7luAH5mBts");
	array_push($colVideos, "hR9WkGciadE");
	$idVideo=$colVideos[array_rand($colVideos)];
?>

<?php
$sysController->end();
?>