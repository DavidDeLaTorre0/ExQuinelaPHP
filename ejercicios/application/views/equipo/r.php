<div class="container jumbotron">

	<h2>Lista de Equipos</h2>
<ul>
	<?php foreach($equipos as $equipo):?>

    <!-- Para que no aparezca el punto de la lista -->
	<li class="list-unstyled"><?= $equipo->nombre?></li>

	<?php endforeach;?>
</ul>
<form action="<?=base_url()?>Equipo/c">
	<input class="btn-warning" type="submit" value="Crear Equipo" />  
</form>

</div>