<?
include 'utiles.php';
login();

if ($_SESSION["nombre"]!="mporto"){
	header("location:login.php");
}

if (isset($_GET["accion"]) && ($_GET["accion"]=="newYoutube")) {

	$sql="update config set idYoutube='" . $_GET["idYoutube"] . "'";
	mysql_query($sql) or die(mysql_error());
	mysql_close();
	header("location:admin.php");

}

if (isset($_GET["accion"]) && ($_GET["accion"]=="rondaCorte")) {

	$sql="update config set rondaCorte='" . $_GET["rondaCorte"] . "'";
	mysql_query($sql) or die(mysql_error());
	mysql_close();
	header("location:admin.php");

}




?>
	
<style>	
	body {font-size:10px; font-family:verdana;}
	td {font-size:10px; font-family:verdana}
	.tbl1 {border-right:1px solid gray; background-color:#B64C4D; font-weight:bold; color:white;}

	td.tdH {border-top:1px solid gray; background-color:#70181A; font-weight:bold; color:white;}
	td.tdT {border-top:1px solid gray; background-color:#990000; font-weight:bold; color:white;}
	td.td1 {border-top:1px solid gray; background-color:#99CCFF; }
	td.td2 {border-top:1px solid gray; background-color:white;}
	td.td3 {border-top:1px solid gray; background-color:#CCCCCC;  }
	td.td3A {border-top:1px solid gray; background-color:#DFDFDF;  font-weight:bold;}
	td.td4 {border-top:1px solid gray; background-color:#EBEBEB; }

	.searchBox
	{
		Border-Right: #003399 1px Solid; Border-Top: #003399 1px Solid; Font-Size: 11px; Border-Left: #003399 1px Solid; Width: 130px; Color: #003399; Border-Bottom: #003399 1px Solid; Font-Family: Tahoma, Helvetica, Arial, Verdana, Sans-Serif; Height: 19px; Background-Color: #Ffffff
	}
</style>

<table >

	<tr><td colspan=2><b><?=$_SESSION["nombre"];?></b></td></tr>

	<tr>
		<td colspan=2>
			<a href="/CA2007">Home</a>  
			| <a href="/CA2007/listaApuesta.php?accion=modi">Mis Jugadas</a>  
			| <a href="/CA2007/rankingCompletoXP.php">Ranking</a> 
			| <a href="/CA2007/fixture.php">Fixture</a> 
			| <a href="/CA2007/reglamento.php">Reglamento</a>
			<br><br><br>
		</td>
	</tr>
	
	<form method=get >
		<tr>
			<td>idYoutube HomePage</td>
			<td>
				<input value="" name="idYoutube"></input>
				<input value="Update Youtube" type="submit"></input>
				<input name="accion" value="newYoutube" type="hidden"></input>
			</td>
		<tr>
	</form>

	<form method=get >
		<tr>
			<td>rondaCorte</td>
			<td>
				<input value="" name="rondaCorte"></input>
				<input value="Update rondaCorte" type="submit"></input>
				<input name="accion" value="rondaCorte" type="hidden"></input>
			</td>
		<tr>
	</form>
</table>



<?
//myFooter();
?>

