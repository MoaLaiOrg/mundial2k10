<?php

class ApuestaUi
{

	public $data;
	function ApuestaUi(){
		$this->data=null;
	}
	
	//----------------

	function display(){

		global $sysController;
		?>
		
		<div class="titles">
			<?php echo $sysController->msg?>
		</div>
		<span id="external" class="mp3">gambeta.mp3</span>
		
		<form name="frmApuesta" action="" method="post">
		
			<div style="display:none" id="controlDiv">
				<input name="do" value="save">
				<input name="idApuesta" value="<?php echo $this->data->idApuesta?>">
				<input name="hash" value="<?php echo $this->data->hash?>">
			</div>

			<table id="tblApuesta" cellpadding="2" cellspacing="0" border="0">
				<tr>
					<td></td>
					<td class="equipoL"></td>
					<td class="tdGoles" <?php echo $this->data->modFixture?>>apuesta</td>
					<td class="tdGoles" <?php echo $this->data->modApuesta?>>final</td>
					<td class="tdPuntos" <?php echo $this->data->modFixture?> <?php echo $this->data->modApuesta?>>puntos</td>
					<td class="tdGoles" <?php echo $this->data->modApuesta?>>final</td>
					<td class="tdGoles" <?php echo $this->data->modFixture?>>apuesta</td>
					<td class="equipo"></td>
					<td class="tdH">PowerUps (ver al pie)</td>
				</tr>

				<?php foreach ($this->data->partidos as $partido){?>
				
					<?php echo $partido->modNuevaFecha?>
					<tr >
					
						<td class="fecha">
							
							<?php echo $partido->fecha?>
							<input class='searchBox' type="hidden" 
								name='idPartido' value='<?php echo $partido->idPartido?>'></input>
						</td>
						
						<td class="equipoL">
							<?php echo $partido->nombre1?>
							<img class="flagIco" src="imgs/flags/<?php echo $partido->idEquipo1?>.gif"></img>
						</td>
						
						<td class="tdGoles" <?php echo $this->data->modFixture?>>
							<input class='inputGoles' name='golesEquipo1[<?php echo $partido->idPartido?>]' 
								value='<?php echo $partido->golesEquipo1?>'></input>
						</td>
						
						<td class="tdFinal" <?php echo $this->data->modApuesta?>>
							<?php echo $partido->golesFinalEquipo1?>
						</td>
						
						<td class="tdPuntos" <?php echo $this->data->modFixture?> <?php echo $this->data->modApuesta?>>
							<h3><?php echo $partido->puntos?></h3>
						</td>
						
						<td class="tdFinal" <?php echo $this->data->modApuesta?>>
							<?php echo $partido->golesFinalEquipo2?>
						</td>
						
						<td class="tdGoles" <?php echo $this->data->modFixture?>>
							<input class='inputGoles' name='golesEquipo2[<?php echo $partido->idPartido?>]' 
								value='<?php echo $partido->golesEquipo2?>'></input>
						</td>

						<td class="equipo">
							<img class="flagIco" src="imgs/flags/<?php echo $partido->idEquipo2?>.gif"></img>
							<?php echo $partido->nombre2?>							
						</td>

						<td class="powerUps">
							<?php if ($partido->mkCoke==1){?><img src="imgs/coke.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkBazan==1){?><img src="imgs/bazanSmall.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkVieja==1){?><img src="imgs/vieja.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkMotoraton==1){?><img src="imgs/motoraton.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkExcellent>=1){?><img src="imgs/excellent.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkAmargo>=1){?><img src="imgs/amargo.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkUsa>=1){?><img src="imgs/usa.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkHyena>=1){?><img src="imgs/hyena.gif" style="border:0px solid gray"></img><?php }?>
							<?php if ($partido->mkTriste>=1){?><img src="imgs/triste.gif" style="border:0px solid gray"></img><?php }?>
						</td>					
					</tr>					
				<?php
				}
			?>
				<tr <?php echo $this->data->modFixture?>>
					<td colspan='9' style='border-top:1px solid silver; text-align:right;'>
						<input id="btnSave" class="btnSave" type="button" value="Guardar Apuesta">
					</td>
				</tr>
			</table>
			
		</form>
				
		<script type="text/javascript">
			$().ready(function() {
			
				$("#btnSave").click(function() {
				
					//validate
					err=false;
					$(".inputGoles").each(function(){
						if (!IsNumeric($(this).attr("value"))){
							err=true;
						}
					})

					if (err==true){
						alert("Faltan ingresar resultados");
						return false;
					}
					
					//confirm
					if (!confirm('Esta seguro?\nUna vez enviada no podra modificarla.')){
						return;
					}else{
						document.frmApuesta.submit();
					}
				});
				
				//
				//jMP3 init
				$("#external").jmp3({
					filepath: "lib/jquery/jMp3/",
					showfilename: "false",
					backcolor: "ffd700",
					forecolor: "8B4513",
					width: 200,
					showdownload: "false",
					autoplay: "true"
				});
				
			});
		</script>
		
		<script type="text/javascript">
			function IsNumeric(sText){
			
				var ValidChars = "0123456789";
				var IsNumber=true;
				var Char;
			   
				if (sText.length==0)
					IsNumber = false;
					
				for (i = 0; i < sText.length && IsNumber == true; i++){ 
					Char = sText.charAt(i);
					if (ValidChars.indexOf(Char) == -1) {
						IsNumber = false;
					}
				}
			   return IsNumber;		   
			}
		</script>

	<?php
	$sysController->sysLayout->awardPanel();
	}
}?>

