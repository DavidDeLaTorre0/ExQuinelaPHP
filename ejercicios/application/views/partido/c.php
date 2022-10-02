<div class="container jumbotron">

	<h2>Nuevo Partido</h2>

	<form action="<?=base_url()?>Partido/cPost" method="post">
	
	<label for="idJornada">Numero de la Jornada:</label>
		<input type="number" id="idJornada" name="nJornada" min="1" max="50" value="1" />

	<br/>
	
	<label for="idFecha">Fecha:</label>
		<input type="date" id="idFecha" name="fecha"/>

		<br/>
		
		<label>Equipo Local:</label>
		<select name="idLocal">
		<?php foreach($equipos as $equipo):?>
			<option value="<?=$equipo->id?>">
				<?=$equipo->nombre?>
			</option>
		<?php endforeach?>
		</select>
		
		
	<label for="idGl">Goles Local:</label>
		<input type="number" id="idGl" min="0" max="50" name="gl"/>
	<br/>

		<label>Equipo Visitante:</label>
		<select name="idVisitante">
		<?php foreach($equipos as $equipo):?>
			<option value="<?=$equipo->id?>">
				<?=$equipo->nombre?>
			</option>
		<?php endforeach?>
		</select>
	

	<label for="idGv">Goles Visitante:</label>
		<input type="number" id="idGv" min="0" max="50" name="gv"/>
	
		<input type="submit" class="btn-warning" value="Crear Partido"/>
	</form>
	
	<form action="<?=base_url()?>">
		<input type="submit" class="btn-danger" value="Volver"/>
	</form>

</div>