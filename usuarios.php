<?
include 'utiles.php';
myHeader();
listaUsuarios();

function listaUsuarios(){

	 global $vwUsuario;
	?>

	<table border=0 cellpadding=5 cellspacing=0>
	<tr><td class=tdT colspan=4>Usuarios</td><tr>
	<tr>
		<td class=tdH>&nbsp;</td>
		<td class=tdH>nombre</td>
		<td class=tdH>apuestas</td>
	</tr><?
	
//	$query="select * from vwRanking order by puntos desc";
	$query="select * from $vwUsuario order by apuestas desc, nombre";
	//echo $query;
	$result=mysql_query($query) or die("mal");
	$num=mysql_numrows($result);

	$i=0;
	while ($i < $num) {

		$idUsuario=mysql_result($result,$i,"idUsuario");
		$nombre=mysql_result($result,$i,"nombre");
		$apuestas=mysql_result($result,$i,"apuestas");
		//$apuestasC=mysql_result($result,$i,"apuestasC");
		//$idEgel=mysql_result($result,$i,"idEgel");
		if (is_null($idEgel))
			$avaEgel='imgs/Clarin.gif';
		else
			$avaEgel='http://www.egelforum.com.ar/forum/image.php?u=' . $idEgel . '&dateline=$';
		?>
		
		<tr>
			<td class=td3><img width=30px height=30px src="<?=$avaEgel?>"></img></td>
			<td class=td1><?=$nombre?></td>
			<td class=td3><?//=$apuestas?>
				
				<?if ($apuestas==0){?>
						<img src="imgs/headshake.gif"></img>
				<?}else{
					for ($j=0; $j<$apuestas; $j++){?>
						<img src="imgs/hyper.gif"></img>
					<?}
				}?>
				
			</td>			
			<!--td class=td4><a href='/egelmundial/listaApuesta.php?accion=modi&idUsuario=<?=$idUsuario?>'>ver</a>&nbsp;</td-->
		</tr>
		
		<?
	$i++;
	}
	?>
	</table>
<?
}
myFooter();
?>

