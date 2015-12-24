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
                <form action="<?= site_url('/ganaderia') ?>" method="post" role="form">
                    <div class="box-body" style="display:table;">
                        <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" name="filtro_id_ganaderia" placeholder="Id">
                        </div>
                        <div class="form-group" style="float:left;display:block;margin-right:20px;">
                            <label for="exampleInputPassword1">Nombre</label>
                            <input type="text" class="form-control" name="filtro_nombre_ganaderia" placeholder="Nombre ">
                        </div>
                        <div class="form-group" style="float:left;display:block;margin-right:20px;">
                            <label for="exampleInputPassword1">Teléfono</label>
                            <input type="text" class="form-control" name="filtro_telefono_ganaderia" placeholder="NIF">
                        </div>
                        <div class="form-group" style="float:left;display:block;margin-right:20px;">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" name="filtro_email_ganaderia" placeholder="Email">
                        </div>
                        <div class="form-group" style="float:left;display:block;margin-right:20px;">
                            <label for="exampleInputPassword1">Población</label>
                            <input type="text" class="form-control" name="filtro_poblacion_ganaderia" placeholder="Población">
                        </div>
                        <div class="form-group" style="float:left;display:block;margin-right:20px;">
                            <label for="exampleInputPassword1">DNI responsable</label>
                            <input type="text" class="form-control" name="filtro_dniresponsable_ganaderia" placeholder="DNI responsable">
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
                    <td>Nombre</td>
                    <td>Teléfono</td>
                    <td>Email</td>
                    <td>Poblacion</td>
                    <td>Responsable</td>
                    <td>Dni responsable</td>
                    <td>Acciones</td>
                </tr>

                <?php foreach ($ganaderias as $ganaderia) : ?>
                <tr>
                    <td style="width:50px;"><?= $ganaderia->id ?></td>
                    <td><?= $ganaderia->nombre ?></td>
                    <td><?= $ganaderia->telefono ?></td>
                    <td><?= $ganaderia->email ?></td>
                    <td><?= $ganaderia->poblacion ?></td>
                    <td><?= $ganaderia->responsable ?></td>
                    <td><?= $ganaderia->dni_responsable ?></td>
                    <td style="width:300px;" id="link">
                        <a href="<?= site_url("/ganaderia/ver/$ganaderia->id")?>"> Ver más</a> |
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>
</section>
</body>
</html>