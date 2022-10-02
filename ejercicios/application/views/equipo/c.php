<div class="container">

<h2>Crear Equipo</h2>

<form action="<?=base_url()?>Equipo/cPost" method="post">
	
	<label for="nombEqui">Escribe el nombre del equipo:
	<input type="text" name="nombre" id="nombEqui" required="required"/>
	</label>
	
	<input type="submit" class="btn-success" value="Crear"/>
</form>

<form action="<?=base_url()?>" >
		<input type="submit" class="btn-danger" value="Volver"/>
</form>
</div>