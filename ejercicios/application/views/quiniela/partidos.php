<?php
function resultado($partido){
    /*  DEVUELVE SEGUN LA CANIDAD DE GOLES DEL EQUIPO Y QWUIEN HAYA GANADO 1, X, 2*/
    
    /* MUCHISIMO CUIDADO CON ESOS PARENTESIS, LE PUSE UNO DE MAS Y NO ME CARGABA LA PAGINA*/
    /*YA ESTA AREGLADO*/
    $resultado = ($partido->gl > $partido->gv) ? '1': ($partido->gl < $partido->gv ? '2' : 'X');
    return $resultado;
    
}

?>

<div class="container jumbotron">

	<h1 class="text-center mb-3">Partidos Jornada <?=$nJornada?></h1>

	<table class="table table-dark">

		<tr>
			<th>Orden</th>
			<th>Eq.Local</th>
			<th>Eq.Visitante</th>
			<th>Resultado</th>
		</tr>
	
<?php  $i=1;?>
<?php foreach($partidos as $partido):?>
<tr>
			<td><?= $i++?></td>
			<td><?= $partido->fetchAs('equipo')->local->nombre?></td>
			<td><?= $partido->fetchAs('equipo')->visitante->nombre?></td>
			<td><?= resultado($partido)?></td>
		</tr>
<?php endforeach?>
		
	
</table>

<form action="<?=base_url()?>Quiniela/jornadas" >

	<input type="submit" class="btn-danger" value="Atras"/>

</form>
</div>