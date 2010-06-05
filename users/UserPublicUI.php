<?php

class UserPublicUi
{

	public $data;
	function UserPublicUi(){
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
		
		<div class="titles">
			<h3>Estan jugando</h3>	
		</div>
		
		<ul id="tblUsers" cellpadding=3 cellspacing=0>
			
			<?php 
			//print_r ($this->data["users"]->list);
			foreach ($this->data["users"]->list as $user){?>
				<li>
					<img width="30px" height="30px" src="http://www.egelforum.net/forum/avatars/amigos/<?php echo $user->username?>.gif"></img>
					<?php echo $user->username?>
				</li>				
			<?php }?>

		</ul>
	<?php
	}
}?>