<section class="content">
	<section class="col-lg-5 connectedSortable">
		<div class="box box-solid bg-green-gradient">
	        <div class="box-header">
	            <i class="fa fa-calendar"></i>
	            <h3 class="box-title">Calendario</h3>
	            <!-- tools box -->
	            <div class="pull-right box-tools">
	                <!-- button with a dropdown -->
	                <div class="btn-group">
	                    <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
	                    <ul class="dropdown-menu pull-right" role="menu">
	                        <li><a href="#">Añadir eventos</a></li>
	                        <!--<li class="divider"></li>
	                        <li><a href="#">View calendar</a></li>-->
	                    </ul>
	                </div>
	                <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                <!--<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>-->
	            </div><!-- /. tools -->
	        </div><!-- /.box-header -->
	        <div class="box-body no-padding">
	            <!--The calendar -->
	            <div id="calendar" style="width: 100%"></div>
	        </div><!-- /.box-body -->

	    </div><!-- /.box -->
	</section>


	<section class="col-lg-5 connectedSortable">
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
			<div id="ola">r</div>
		</div>
	</section>
</section>
</body>
</html>