<div class="container jumbotron">

	<h2>Lista De Partidos</h2>
	
	<form action="<?=base_url()?>Partido/r" method="get">
		<input type="date" name="fecha"/>
		<input type="submit" value="Filtrar"/>
		
	</form>
	<table class="table table-dark">
	
	<tr>
		<th>nJornada</th>
		<th>Fecha</th>
		<th>Eq.Local</th>
		<th>Eq.Visitante</th>
		<th>Resultado</th>
	</tr>
	<?php foreach ($partidos as $partido):?>
	<tr>
	<td><?=$partido->nJornada?></td>
	<td><?=$partido->fecha?></td>
	<td><?=$partido->fetchAs('equipo')->local->nombre?></td>
	<td><?=$partido->fetchAs('equipo')->visitante->nombre?></td>
	<td><?=$partido->gl?>-<?= $partido->gv?></td>
	</tr>
	<?php endforeach;?>
	</table>
	
	<form action="<?=base_url()?>Partido/c" method="get">
		<input type="submit" class="btn-warning" value="Crear Partido"/>
	</form>
</div>