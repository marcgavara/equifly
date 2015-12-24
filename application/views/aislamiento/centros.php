<!-- EMPIEZA EL CUERPO -->
<script>
$( document ).ready(function() {
    $("#filtro_fecha_entrada").datepicker();
    $("#filtro_fecha_salida").datepicker();
});
</script>
<section class="content">
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
        <div class="box box-warning" style="">
            <div class="box-header">
                <h3 class="box-title">Centros de aislamiento</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="#" method="post" role="form">
                <div class="box-body" style="display:table;">
                    <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" class="form-control" name="filtro_id_centro" placeholder="Id centro">
                    </div>
                    <div class="form-group" style="width:150px;float:left;display:block;margin-right:20px;">
                        <label for="exampleInputPassword1">Nombre</label>
                        <input type="text" class="form-control" name="filtro_nombre_centro" placeholder="Nombre centro">
                    </div>
                    <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                        <label for="exampleInputPassword1">NIF</label>
                        <input type="text" class="form-control" name="filtro_nif_centro" placeholder="NIF">
                    </div>
                    <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" name="filtro_email_centro" placeholder="Email centro">
                    </div>
                    <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                        <label for="exampleInputPassword1">Telefono</label>
                        <input type="text" class="form-control" name="filtro_telefono_centro" placeholder="Teléfono centro">
                    </div>


                </div><!-- /.box-body -->
                <div class="box-footer">
                    <input type="submit" id="buscar" value="Buscar" class="btn btn-success" style="width:100px;">
                    <input type="submit" id="borrar" name="borrar" value="Borrar" class="btn btn-danger" style="width:100px;">
                </div>
            </form>
        </div>
        <table class="table table-hover">
            <tr>
                <td style="width:50px;">ID</td>
                <td>Nif</td>
                <td>Nombre</td>
                <td>Email centro</td>
                <td>Teléfono centro</td>
                <td>Responsable</td>
                <td>Acciones</td>
            </tr>
            <?php foreach ($centros as $centro) : ?>
            <tr>
                <td style="width:50px;"><?= $centro->id ?></td>
                <td><?= $centro->nif ?></td>
                <td><?= $centro->nombre ?></td>
                <td><?= $centro->email_centro ?></td>
                <td><?= $centro->telefono_centro ?></td>
                <td><?= $centro->responsable ?></td>
                <td style="width:300px;" id="link">
                    <a href="<?= site_url("/aislamiento/ver_centro/$centro->id")?>">Ver más</a><br />
                    <a href="<?= site_url("/aislamiento/eliminar_centro/$centro->id")?>">Eliminar</a>
                </td>
            <?php endforeach; ?>
        </table>
    </div>
</sectiuon>
</body>
</html>