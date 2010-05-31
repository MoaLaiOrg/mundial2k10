<?
include 'utiles.php';
//login();

if (isset($_GET["orden"]))
	$orden=($_GET["orden"]);

myHeader();
rankingCompleto();

function rankingCompleto(){

	global $vwRankingCompleto;
	global $keOrden;
	global $orden;

	?>
	<table border=0 cellpadding=5 cellspacing=0>
	<tr><td class=tdT colspan=10>Ranking XP</td><tr>
	<tr>
		<td class=tdH>usuario</td>
		<td class=tdH>#ap</td>
		<td class=tdH>jugando</td>
		<td class=tdH>&nbsp;</td>
		<td class=tdH><a style="color:white" href="/prode2006/rankingCompletoXP.php?orden=T">Tot</a></td>
		<td class=tdH>#rank</td>
		<td class=tdH>&nbsp;</td>
	</tr><?

	class clsItemRanking {
		var $nombre;
		var $idApuesta;
		var $puntos;
		var $idFicha;
		var $rank;
		
		function clsItemRanking() {
	       //$this->$rank = 1;
	   }
	}	

	$colItemRanking =array();
	$query="select * from $vwRankingCompleto where tbEstado='P' order by puntos desc, isnull(idFicha), nombre asc";
	$result=mysql_query($query) or die(mysql_error ());
	$num=mysql_numrows($result);

	$i=0; $rank=0; $puntosAnterior=-1;
	while ($i < $num) {

		$itemRanking=new clsItemRanking;
		$itemRanking->apodoEquipo=mysql_result($result,$i,"apodoEquipo");
		$itemRanking->nombre=mysql_result($result,$i,"nombre");
		$itemRanking->idApuesta=mysql_result($result,$i,"idApuesta");
		$itemRanking->puntos=mysql_result($result,$i,"puntos");
		$itemRanking->idFicha=mysql_result($result,$i,"idFicha");

		if ($puntosAnterior!=$itemRanking->puntos) $rank++;
		$puntosAnterior=$itemRanking->puntos;
		$itemRanking->rank=$rank;

		array_push($colItemRanking, $itemRanking);
		
	$i++;
	}

	$maxRank=$rank;

	$keClassR1="td3"; $keClassR2="td3"; $keClassR3="td3"; $keClassT="td3"; 
	if ($orden=="R1") $keClassR1="tdT";
	if ($orden=="R2") $keClassR2="tdT";
	if ($orden=="R3") $keClassR3="tdT";
	if ($orden=="T") $keClassT="tdT";

	//dibuja
	for($i=0; $i<count($colItemRanking); $i++){?>
		<tr>
			<td class=td1>
				<img src="imgs/teams/small/<?=$colItemRanking[$i]->apodoEquipo?>.gif" height="15px" width="15px"></img>&nbsp;
				<?=$colItemRanking[$i]->nombre?>
			</td>
			<td class=td1><?=$colItemRanking[$i]->idApuesta?></td>
			<td class=td1><?=strEstadoApuesta($colItemRanking[$i]->idFicha)?></td>			
			<td class=td1>
				<?if($colItemRanking[$i]->nombre=="abazan"){?>
					<img src="imgs/bazan.gif"></img>
				<?}else{?>
					<img src="<?=imgEstadoApuesta($colItemRanking[$i]->idFicha)?>"></img>
				<?}?>
			</td>
			<td class=<?=$keClassT?>><?=$colItemRanking[$i]->puntos?></td>
			<?=determinaRango($colItemRanking[$i]->rank, $maxRank)?>
			<td class=td4><a href='abmApuestaLate.php?idApuesta=<?=$colItemRanking[$i]->idApuesta?>&accion=modi'>ver</a></td>
		</tr>		

	<?}?>
	</table>			
<?}?>


<?
myFooter();
?>


<style>	
	td.r1 {border-top:1px solid gray; background-color:#00CC99; font-weight:bold; color:white;}
	td.rP {border-top:1px solid gray; background-color:black; font-weight:bold; color:cyan;}
	td.r3 {border-top:1px solid gray; background-color:cyan; font-weight:bold; color:red;}
	td.r4 {border-top:1px solid gray; background-color:magenta; font-weight:bold; color:grey;}
	td.r5 {border-top:1px solid gray; background-color:blue; font-weight:bold; color:yellow;}
	td.r6 {border-top:1px solid gray; background-color:yellow; font-weight:bold; color:black;}
	td.r7 {border-top:1px solid gray; background-color:#CC66FF; font-weight:bold; color:white;}
	td.r8 {border-top:1px solid gray; background-color:#CCFF99; font-weight:bold; color:#996600;}
	td.r9 {border-top:1px solid gray; background-color:#FF0066; font-weight:bold; color:#3333FF;}
	td.rL {border-top:1px solid gray; background-color:black; font-weight:bold; color:white;}

</style>

<?
function determinaRango($rankActual, $rankUltimo){

	$arrRangoRanking=array();
//	array_push($arrRangoRanking, "<td class='r1'>IL BATI ($rankActual)</td>");
//	array_push($arrRangoRanking, "<td class='r1'>EL PIBE ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r1'>EL AVE ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='rP'>PERDEDOR ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r3'>ESTE SABE ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r6'>WALTER NELSON ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r7'>JODER! ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r8'>CARLITOX ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r9'>ELIO ROSSI ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r4'>NI MODO ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='r5'>PEOR SER? ($rankActual)</td>");
	array_push($arrRangoRanking, "<td class='rL'>POBRE TIPO ($rankActual)</td>");

	$cantRangos=count($arrRangoRanking)-3;

	$rango=round($rankActual / $rankUltimo * $cantRangos, 2);
	$log="rankActual:" . $rankActual . " rankUltimo:" . $rankUltimo . " cantRangos:"  . $cantRangos . " rango:" . $rango . " rangoFinal:" . ceil($rango);

	if ($rankActual>$rankUltimo)
		return "imposible out of bound";

	if ($rankActual==1) //primero
		return $arrRangoRanking[0];

	if ($rankActual==$rankUltimo) //ultimo
		return $arrRangoRanking[$cantRangos+1];

	if ($rankActual==2) //perdedor
		return $arrRangoRanking[1];

	return $arrRangoRanking[$rango];

}

?>


