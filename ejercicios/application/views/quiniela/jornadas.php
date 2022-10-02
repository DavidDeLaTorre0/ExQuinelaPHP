<div class="container jumbotron">

	<h1>Lista de Jornadas</h1>
	
	<form action="<?=base_url()?>quiniela/partidos">
	
	<?php foreach($nJornadas as $nJornada):?>		
			<input type="submit" name="nJornada" value="<?=$nJornada?>">
	<?php endforeach;?>
	</form>
	
</div>