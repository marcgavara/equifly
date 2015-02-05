<!-- EMPIEZA EL CUERPO -->
<script>
$( document ).ready(function() {
    $("#filtro_fecha_entrada").datepicker();
    $("#filtro_fecha_salida").datepicker();
});
</script>
<div class="container_elements">
    <?php if($message) : ?>
        <div class="alert alert-success alert-dismissable" id="error_message" style="margin-top:20px;width:auto;">
            <i class="fa fa-check"></i>
            <button type="button" class="close" id="close_error"><span aria-hidden="true">×</span></button>
            <?= $message ?>
        </div>
     <?php elseif($error) : ?>
        <div class="alert alert-danger alert-dismissable" id="error_message" style="margin-top:20px;width:80%;float:right;">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" id="close_error"><span aria-hidden="true">×</span></button>
            <?= $error ?>
        </div>
    <?php endif; ?>  
        <div class="box box-warning" style="margin-top:10px;">
        <div class="box-header">
            <h3 class="box-title">Listado de caballos</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="<?= site_url("/caballos/")?>" method="post" role="form">
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" name="filtro_id_caballo" placeholder="<?= isset($id_caballo) && $id_caballo ? $id_caballo : 'ID' ?>">
                </div>
                <div class="form-group" style="width:150px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Caballo</label>
                    <input type="text" class="form-control" name="filtro_nombre_caballo" placeholder="<?= isset($nombre_caballo) && $nombre_caballo ? $nombre_caballo : 'Caballo' ?>">
                </div>
                <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Microchip</label>
                    <input type="text" class="form-control" name="filtro_chip" placeholder="<?= isset($chip) && $chip ? $chip : 'Microchip' ?>">
                </div>
                <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">ULN</label>
                    <input type="text" class="form-control" name="filtro_veln" placeholder="<?= isset($veln) && $veln ? $veln : 'ULN' ?>">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>País destino</label>
                    <select class="form-control" name="filtro_pais_destino" id="filtro_pais_destino">
                        <option value="">País destino</option>
                        <?php foreach ($paises as $pais) : ?>
                            <option value="<?= $pais->id ?>" <?= isset($id_pais_destino) && $id_pais_destino && $id_pais_destino == $pais->id ? 'selected="selected"' : '' ?> ><?= $pais->pais ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha entrada</label>
                    <input type="text" class="form-control" id="filtro_fecha_entrada" name="filtro_fecha_entrada" placeholder="<?= isset($fecha_entrada) && $fecha_entrada ? $fecha_entrada : NULL ?>">
                </div>
                <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha salida</label>
                    <input type="text" class="form-control" id="filtro_fecha_salida" name="filtro_fecha_salida" placeholder="<?= isset($fecha_salida) && $fecha_salida ? $fecha_salida : NULL ?>">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Centro aislamiento</label>
                    <select class="form-control" id="filtro_centro_aislamiento" name="filtro_centro_aislamiento">
                        <option value="" slected>Centro aislamiento</option>
                        <?php foreach ($centros_asilamiento as $centro) : ?>
                            <option value="<?= $centro->id ?>" <?= isset($id_centro_aislamiento) && $id_centro_aislamiento && $id_centro_aislamiento == $centro->id ? 'selected="selected"' : '' ?> ><?= $centro->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <input type="submit" id="buscar" value="Buscar" class="btn btn-success" style="width:100px;">
                <input type="submit" id="borrar" name="borrar" value="Borrar" class="btn btn-danger" style="width:100px;">
                <input type="button" id="nuevo" name="nuevo" value="Nuevo caballo" class="btn btn-info" style="width:150px;" onclick="javascript(windowd.location.href='ddd')">
            </div>
        </form>
    </div>  
    <table class="table table-hover">
        <tr>
            <td style="width:50px;">ID</td>
            <td>Caballo</td>
            <td>Chip</td>
            <td>Veln</td>
            <td>País destino</td>
            <td>Fecha entrada</td>
            <td>Fecha Salida</td>
            <td>Centro aislamiento</td>
            <td>Acciones</td>
        </tr>
        <?php foreach ($caballos as $caballo) : ?>
          <tr>
            <td style="width:50px;"><?= $caballo->id_caballo ?></td>
            <td><?= $caballo->nombre_caballo ?></td>
            <td><?= $caballo->microchip ?></td>
            <td><?= $caballo->veln ?></td>
            <td><?= $caballo->id_pais_destino ?></td>
            <td><?= date("Y-m-d", $caballo->fecha_entrada_centro) ?></td>
            <td><?= date("Y-m-d", $caballo->fecha_salida_centro) ?></td>
            <td><?= $caballo->nombre_centro_aislamiento ?></td>
            <td style="width:auto;" id="link">
                <a href="<?= site_url("/caballos/ver/$caballo->id_caballo")?>"> Ver más</a> <br />
                <a href="#"> Veterinarios</a> <br />
                <a href="#"> Cuarentena</a>
            </td>
          </tr>
        <?php endforeach; ?>
    </table> 
</div>
</body>
</html>	