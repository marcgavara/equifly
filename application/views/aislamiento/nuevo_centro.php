<section class="content">
    <div class="col-md">
        <?php if($message) : ?>
            <div class="alert alert-success alert-dismissable" id="alert_message">
                <i class="fa fa-check"></i>
                <button type="button" class="close" id="close_message"><span aria-hidden="true">×</span></button>
                <?= $message ?>
            </div>
        <?php elseif($error) : ?>
            <div class="alert alert-danger alert-dismissable" id="error_message">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" id="close_error"><span aria-hidden="true">×</span></button>
                <?= $error ?>
            </div>
        <?php endif; ?>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Añadir centro de aislamiento </b></h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="<?= site_url("/aislamiento/nuevo_centro")?>" method="post" role="form">
                <div class="box-body">

                    <!-- Primera línea -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIF <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="nif" id="nif" value="<?= set_value('nif') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="nombre" value="<?= set_value('nombre') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Dirección <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="direccion" value="<?= set_value('direccion') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Población <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="poblacion" value="<?= set_value('poblacion') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">CP <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="cp" value="<?= set_value('cp') ?>">
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Teléfono del centro <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="telefono_centro" value="<?= set_value('telefono_centro') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email del centro <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="email_centro" value="<?= set_value('email_centro') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Çódigo REGA <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="codigo_rega" value="<?= set_value('codigo_rega') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Marca oficial <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="marca_oficial" value="<?= set_value('marca_oficial') ?>">
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Segunda línea -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Responsable <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="responsable" value="<?= set_value('responsable') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email del responsable <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="email_responsable" value="<?= set_value('email_responsable') ?>">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Teléfono del responsable <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="telefono_responsable" value="<?= set_value('telefono_responsable') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputFile">¿Cuántos boxes tiene? <span style="color:red;">*</span></label><br />
                                <select name="num_boxes" id="num_boxes" class="form-control">
                                    <option>Selecciona uno</option>
                                    <?php for ($i=0; $i < 50; $i++) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputFile">Infermería <span style="color:red;">*</span></label><br />
                                <select id="infermeria" name="infermeria" class="form-control">
                                    <option selected="">Selecciona</option>
                                    <option value="si">Sí</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Segunda línea -->
                    <div class="form-group">
                        <div class="col-xs-9">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Observaciones <span style="color:red;">*</span></label><br />
                                <textarea class="form-control" rows="3" placeholder="Observaciones..." name="observaciones"><?= set_value('observaciones') ?></textarea>
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Segunda línea -->
                    <div class="form-group">
                        <div class="col-xs-9">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Imágenes del centro <span style="color:red;">*</span></label><br />
                                    <input type="file" name="userfile[]" />
                                    <input type="file" name="userfile[]" />
                                    <input type="file" name="userfile[]" />
                            </div>
                        </div>
                    </div>

                    <br /><br /><br /><br /><br />
                    <br /><br /><br />
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</section>







<!--<div style="clear:both;"></div>
EMPIEZA EL CUERPO
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message" id="alert_message">
            <button type="button" class="close" id="close_message"><span aria-hidden="true">×</span></button>
            <?= $message ?>
        </div>
    <?php elseif($error) : ?>
        <div class="error_message" id="error_message">
            <button type="button" class="close" id="close_error"><span aria-hidden="true">×</span></button>
            <?= $error ?>
        </div>
    <?php endif; ?>
	<div id="header_content">
	<h3>Datos de un nuevo centro de aislamiento </b></h3>
	</div>
	<div class="table_view" >
    <form action="<?= site_url("/aislamiento/nuevo_centro")?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>NIF</td>
                <td><input type="text" id="nif" name="nif" value="<?= set_value('nif')?>"></td>
                <td>Nombre</td>
                <td colspan="5"><input type="text" name="nombre" id="nombre" value="<?= set_value('nombre')?>" style="width:97%;"></td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td colspan="3"><input type="text" name="direccion" value="<?= set_value('direccion')?>" style="width:95%;"></td>
                <td>Población</td>
                <td><input type="text" name="poblacion" value="<?= set_value('poblacion')?>"></td>
                <td>CP</td>
                <td><input type="text" name="cp" value="<?= set_value('cp')?>"></td>
            </tr>
            <tr>
                <td>Teléfono del centro</td>
                <td><input type="text" name="telefono_centro" value="<?= set_value('telefono_centro')?>"></td>
                <td>Email del centro</td>
                <td><input type="text" name="email_centro" value="<?= set_value('email_centro')?>"></td>
                <td>Código REGA</td>
                <td><input type="text" name="codigo_rega" value="<?= set_value('codigo_rega')?>"></td>
                <td>Marca oficial</td>
                <td><input type="text" name="marca_oficial" value="<?= set_value('marca_oficial')?>"></td>
            </tr>
            <tr>
                <td>Responsable</td>
                <td><input type="text" name="responsable" value="<?= set_value('responsable')?>"></td>
                <td>Email del responsable</td>
                <td><input type="text" name="email_responsable" value="<?= set_value('email_responsable')?>"></td>
                <td>Teléfono del responsable</td>
                <td><input type="text" name="telefono_responsable" value="<?= set_value('telefono_responsable')?>"></td>
                <td>Num boxes</td>
                <td>
                    <select id="num_boxes" name="num_boxes">
                        <option>¿Num boxes?</option>
                        <?php for ($i=0; $i < 50; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>¿Infermería?</td>
                <td><select name="infermeria">
                    <option selected="">¿Infermería?</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                <td>Imágen del centro</td>
                <td colspan="5">
                    <input type="file" name="userfile[]" />
                    <input type="file" name="userfile[]" />
                    <input type="file" name="userfile[]" />
                </td>
            </tr>
            <tr>
                <td>Observaciones</td>
                <td colspan="3">
                    <textarea rows="4" cols="50" name="observaciones"><?= set_value('observaciones')?></textarea>
                </td>
                <td>Acciones</td>
                <td colspan="4">
                    <input type="submit" id="guardar" value="guardar" class="button_save">
                </td>
            </tr>
        </table>
    </form>
</div>-->
<script type="text/javascript">
$(document).ready(function(){
    $("#nif").blur(function(){
        var nif = $("#nif").val();
        $.ajax({
            url: "/aislamiento/comprueba_nif",
            type: "post",
            data: {nif:nif},
            success: function(data){
                if(!data.success) {
                    alert("Este NIF está registrado con el centro: " + data.nombre_otro_centro);
                    $("#nif").focus();
                    $("#nif").css('color','red');
                    $("#guardar").hide();
                } else {
                    $("#guardar").show();
                    $("#nif").css('color','black');
                }
            }
        });
    });
});

</script>
</body>
</html>