
<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
<div class="container_elements">
	<div class="info_entradas">
		<h3>Información de entradas y salidas próximas a realizarse</h3>
	</div>
	<div class="info_cuarentena">
		<h3>Información del estado de la cuarentena de los caballos</h3>
	</div>
	<div class="info_recordatorio">
		<h3>Recordatorios</h3>
		<?php foreach ($recordatorios as $recordatorio) : ?>
			<li>Al caballo <a href="<?= site_url('caballos/ver/'.$recordatorio->id) ?>"><?= $recordatorio->nombre ?></a> no tiene todos los datos necesarios</li>
		<?php endforeach; ?>
	</div>
</div>
</body>
</html>	