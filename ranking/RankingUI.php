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
		global $vwApuestaDetallePuntos;
		global $vwApuestaDetalle;
		global $vwPuntos;
		
		for($i=0; $i<count($colItemRanking); $i++){?>
			<tr>
				<td class=td1>
					<?=$colItemRanking[$i]->nombre?>
				</td>
				<td class=td1><?=$colItemRanking[$i]->idApuesta?></td>
				<td class=<?=$keClassT?>>
					<?=$colItemRanking[$i]->puntos?>
				</td>
				<td class=td4>
					<a href='abmApuestaLate.php?idApuesta=<?=$colItemRanking[$i]->idApuesta?>&accion=modi'>
						ver
					</a>
				</td>
			</tr>
		<?}?>
	<?php
	}
}?>