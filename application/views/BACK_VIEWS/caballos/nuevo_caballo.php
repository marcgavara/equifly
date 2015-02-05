<div class="container_elements">
    <?php if($message) : ?>
        <div class="alert alert-success alert-dismissable" id="error_message" style="margin-top:20px;width:auto;">
            <i class="fa fa-check"></i>
            <button type="button" class="close" id="close_error"><span aria-hidden="true">×</span></button>
            <?= $message ?>
        </div>
    <?php elseif($error) : ?>
        <div class="alert alert-danger alert-dismissable" id="error_message" style="margin-top:20px;width:auto;">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" id="close_error"><span aria-hidden="true">×</span></button>
            <?= $error ?>
        </div>
    <?php endif; ?>
    <div class="box box-warning" style="margin-top:10px;">
        <div class="box-header">
            <h3 class="box-title">Añadir un nuevo caballo</h3>
        </div>
        <form action="<?= site_url("/caballos/nuevo_caballo")?>" method="post" role="form" id="form_nuevo_caballo">
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:200px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" name="nombre_caballo" value="<?= set_value('nombre_caballo'); ?>" placeholder="Nombre del caballo">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Raza</label>
                    <select class="form-control" name="id_raza" id="id_raza">
                        <option value="">Raza</option>
                        <?php foreach ($razas as $raza) : ?>
                            <option value="<?= $raza->id ?>" ><?= $raza->raza ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="width:100px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Propietario</label>
                    <input type="text" class="form-control" name="propietario" value="<?= set_value('propietario') ?>">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Sexo</label>
                    <select class="form-control" name="sexo" id="sexo">
                        <option value="">Sexo</option>
                            <option value="macho">Macho</option>
                            <option value="hembra">Hembra</option>
                    </select>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Pasaporte</label>
                    <input type="text" class="form-control" name="pasaporte" placeholder="Pasaporte" value="<?= set_value('pasaporte'); ?>">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Capa</label>
                    <select class="form-control" name="id_capa" id="id_capa">
                        <option value="">Capa</option>
                        <?php foreach ($capas as $capa) : ?>
                            <option value="<?= $capa->id ?>" ><?= $capa->capa ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Microchip</label>
                    <input type="text" class="form-control" name="microchip" value="<?= set_value('microchip'); ?>" placeholder="Microchip">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha nacimiento</label>
                    <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= set_value('fecha_nacimiento'); ?>" placeholder="Fecha nacimiento">
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>País destino</label>
                    <select class="form-control" name="id_pais_destino" id="id_pais_destino">
                        <option value="">País</option>
                        <?php foreach ($paises as $pais) : ?>
                            <option value="<?= $pais->id ?>" ><?= $pais->pais ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha Recogida</label>
                    <input type="text" class="form-control" id="fecha_recogida" name="fecha_recogida" value="<?= set_value('fecha_recogida'); ?>" placeholder="Fecha recogida">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Ganaderia orígen</label>
                    <select class="form-control" id="id_ganaderia_origen" name="id_ganaderia_origen">
                        <option value="">¿Ganaderia origen?</option>
                        <?php foreach ($ganaderias as $ganaderia) : ?>
                            <option value="<?= $ganaderia->id ?>" ><?= $ganaderia->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha Entr centro</label>
                    <input type="text" class="form-control" id="fecha_entrada_centro" name="fecha_entrada_centro"  value="<?= set_value('fecha_entrada_centro'); ?>" placeholder="Fecha entr centro">
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha prev salida</label>
                    <input type="text" class="form-control" id="fecha_salida_centro" name="fecha_salida_centro" value="<?= set_value('fecha_salida_centro'); ?>" placeholder="Fecha prev salida">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Centro aislamiento</label>
                    <select class="form-control" id="id_centro_aislamiento" name="id_centro_aislamiento">
                        <option value="" slected>Centro aislamiento</option>
                        <?php foreach ($centros_asilamiento as $centro) : ?>
                            <option value="<?= $centro->id ?>" <?= isset($id_centro_aislamiento) && $id_centro_aislamiento && $id_centro_aislamiento == $centro->id ? 'selected="selected"' : '' ?> ><?= $centro->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Num cotización</label>
                    <input type="text" class="form-control" name="num_cotizacion" value="<?= set_value('num_cotizacion'); ?>" placeholder="Num cotización">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">ASE</label>
                    <input type="text" class="form-control" name="ase" value="<?= set_value('ase'); ?>" placeholder="ASE">
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Observaciones</label>
                    <textarea class="form-control" name="observaciones" rows="4" cols="50" value="<?= set_value('observaciones'); ?>" style="width:700px;"></textarea>
                </div>
            </div><!-- /.box-body -->
            <div class="box-body" style="display:table;">
                <div class="box-header">
                    <h3 class="box-title">Datos centro aislamiento</h3>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">1ª extracción</label>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="text" class="form-control" value="<?= set_value('fecha_extraccion_centro_1'); ?>" placeholder="Fecha" id="fecha_extraccion_centro_1" name="fecha_extraccion_centro_1">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Hora</label>
                    <input type="text" class="form-control" value="<?= set_value('hora_extraccion_centro_1'); ?>" placeholder="Hora" id="hora_extraccion_centro_1" name="hora_extraccion_centro_1" maxlength="5">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Resultados</label>
                    <select class="form-control" id="resultados_extraccion_centro_1" name="resultados_extraccion_centro_1">
                        <option value="" slected>Resultados</option>
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">2ª extracción</label>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="text" class="form-control" value="<?= set_value('fecha_extraccion_centro_2'); ?>" placeholder="Fecha" id="fecha_extraccion_centro_2" name="fecha_extraccion_centro_2">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Hora</label>
                    <input type="text" class="form-control" value="<?= set_value('hora_extraccion_centro_2'); ?>" placeholder="Hora" id="hora_extraccion_centro_2" name="hora_extraccion_centro_2" maxlength="5">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Resultados</label>
                    <select class="form-control" id="resultados_extraccion_centro_2" name="resultados_extraccion_centro_2">
                        <option value="" slected>Resultados</option>
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">3ª extracción</label>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="text" class="form-control" value="<?= set_value('fecha_extraccion_centro_3'); ?>" placeholder="Fecha" id="fecha_extraccion_centro_3" name="fecha_extraccion_centro_3">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Hora</label>
                    <input type="text" class="form-control" value="<?= set_value('hora_extraccion_centro_3'); ?>" placeholder="Hora" id="hora_extraccion_centro_3" name="hora_extraccion_centro_3" maxlength="5">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Resultados</label>
                    <select class="form-control" id="resultados_extraccion_centro_3" name="resultados_extraccion_centro_3">
                        <option value="" slected>Resultados</option>
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Observaciones</label>
                    <textarea class="form-control" name="observaciones_extraccion_centro" rows="4" cols="50" value="<?= set_value('observaciones_extraccion_centro'); ?>" style="width:700px;"></textarea>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="box-header">
                    <h3 class="box-title">Datos ganadería orígen</h3>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">1ª extracción</label>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="text" class="form-control" value="<?= set_value('fecha_extraccion_ganaderia_1'); ?>" placeholder="Fecha" id="fecha_extraccion_ganaderia_1" name="fecha_extraccion_ganaderia_1">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Hora</label>
                    <input type="text" class="form-control" value="<?= set_value('hora_extraccion_ganaderia_1'); ?>" placeholder="Hora" id="hora_extraccion_ganaderia_1" name="hora_extraccion_ganaderia_1" maxlength="5">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Resultados</label>
                    <select class="form-control" id="resultados_extraccion_ganaderia_1" name="resultados_extraccion_ganaderia_1">
                        <option value="" slected>Resultados</option>
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">2ª extracción</label>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="text" class="form-control" value="<?= set_value('fecha_extraccion_ganaderia_2'); ?>" placeholder="Fecha" id="fecha_extraccion_ganaderia_2" name="fecha_extraccion_ganaderia_2">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Hora</label>
                    <input type="text" class="form-control" value="<?= set_value('hora_extraccion_ganaderia_2'); ?>" placeholder="Hora" id="hora_extraccion_ganaderia_2" name="hora_extraccion_ganaderia_2" maxlength="5">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Resultados</label>
                    <select class="form-control" id="resultados_extraccion_ganaderia_2" name="resultados_extraccion_ganaderia_2">
                        <option value="" slected>Resultados</option>
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">3ª extracción</label>
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="text" class="form-control" value="<?= set_value('fecha_extraccion_ganaderia_3'); ?>" placeholder="Fecha" id="fecha_extraccion_ganaderia_3" name="fecha_extraccion_ganaderia_3">
                </div>
                <div class="form-group" style="width:140px;float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Hora</label>
                    <input type="text" class="form-control" value="<?= set_value('hora_extraccion_ganaderia_3'); ?>" placeholder="Hora" id="hora_extraccion_ganaderia_3" name="hora_extraccion_ganaderia_3" maxlength="5">
                </div>
                <div class="form-group" style="width:175px;float:left;display:block;margin-right:20px;">
                    <label>Resultados</label>
                    <select class="form-control" id="resultados_extraccion_ganaderia_3" name="resultados_extraccion_ganaderia_3">
                        <option value="" slected>Resultados</option>
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </div>
            </div>
            <div class="box-body" style="display:table;">
                <div class="form-group" style="float:left;display:block;margin-right:20px;">
                    <label for="exampleInputPassword1">Observaciones</label>
                    <textarea class="form-control" name="observaciones_extraccion_ganaderia" rows="4" cols="50" value="<?= set_value('observaciones_extraccion_ganaderia'); ?>" style="width:700px;"></textarea>
                </div>
            </div>
            <div class="box-footer">
                <input type="submit" id="buscar" value="Añadir" class="btn btn-success" style="width:100px;">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
    $('#guardar').click(function() {
        $("#form_nuevo_caballo").submit();
    })

    
});

</script>
</body>
</html> 