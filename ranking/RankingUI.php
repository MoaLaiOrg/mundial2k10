<?php

class RankingUi
{

	public $data;
	function RankingUi(){
		$this->data=array();
		$this->data["user"]=null;
		$this->data["users"]=null;
	}
	
	//----------------

	function display(){
	
		global $sysController;
		?>
		
		<div class="titles">
			<?php echo $sysController->msg?>
		</div>
		
		<table id="tblUsers" cellpadding=3 cellspacing=0>
			
			<?php 
			//print_r ($this->data["users"]->list);
			foreach ($this->data["users"]->list as $user){?>
				<tr>
					<td style='border-top:1px solid silver'>
						<?php echo $user->username?>
					</td>
					<td style='border-top:1px solid silver'>
						<?php echo $user->total?>
					</td>
				<tr>	
			<?php }?>

		</table>
	<?php
	}
}?>