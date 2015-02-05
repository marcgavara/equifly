<section class="content">
    <div class="col-md">
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
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Añadir un nuevo caballo</h3>
            </div>
            <!--<form action="<?= site_url("/caballos/nuevo_caballo")?>" method="post" role="form" id="form_nuevo_caballo">-->
            <form role="form" action="<?= site_url("/caballos/nuevo_caballo")?>" method="post" id="form_nuevo_caballo">
                <div class="box-body">

                    <!-- Primera línea -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="nombre_caballo" value="<?= set_value('nombre_caballo') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Propietario <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="propietario" value="<?= set_value('propietario') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pasaporte <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="pasaporte" value="<?= set_value('pasaporte') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Microchip <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="microchip" value="<?= set_value('microchip') ?>">
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Segunda línea -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputFile">Raza <span style="color:red;">*</span></label><br />
                                <select name="id_raza" id="id_raza" class="form-control">
                                    <option>Select one</option>
                                <?php foreach ($razas as $raza) : ?>
                                    <option value="<?= $raza->id ?>"><?= $raza->raza ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputFile">Sexo <span style="color:red;">*</span></label><br />
                                <select id="sexo" name="sexo" class="form-control">
                                    <option>¿Sexo?</option>
                                    <option value="macho">Macho</option>
                                    <option value="hembra">Hembra</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Capa <span style="color:red;">*</span></label><br />
                                <select name="id_capa" class="form-control">
                                    <option>¿Capa?</option>
                                <?php foreach ($capas as $capa) : ?>
                                    <option value="<?= $capa->id ?>"><?= $capa->capa ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ganaderia orígen <span style="color:red;">*</span></label><br />
                                <select id="id_ganaderia_origen" name="id_ganaderia_origen" class="form-control">
                                    <option value="">¿Ganaderia origen?</option>
                                    <?php foreach ($ganaderias as $ganaderia) : ?>
                                        <option value="<?= $ganaderia->id ?>"><?= $ganaderia->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Tercera línea -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha nacimiento <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= set_value('fecha_nacimiento') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha recogida <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" id="fecha_recogida" name="fecha_recogida" value="<?= set_value('fecha_recogida') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cotización <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="num_cotizacion" value="<?= set_value('num_cotizacion') ?>">
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">País destino <span style="color:red;">*</span></label><br />
                                <select id="id_pais_destino" name="id_pais_destino" class="form-control">
                                    <option value="">¿País?</option>
                                    <?php foreach ($paises as $pais) : ?>
                                        <option value="<?= $pais->pais ?>"><?= $pais->pais ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Cuarta línea -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Centro aislamiento <span style="color:red;">*</span></label><br />
                                <select name="id_centro_aislamiento" class="form-control">
                                    <option>¿Centro aislamiento?</option>
                                    <?php foreach ($centros_asilamiento as $centro) : ?>
                                        <option value="<?= $centro->id ?>"><?= $centro->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha entr Centri Aislamiento <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" id="fecha_entrada_centro" name="fecha_entrada_centro" value="<?= set_value('fecha_entrada_centro') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Fecha salida previsata Aislamiento <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" id="fecha_salida_centro" name="fecha_salida_centro" value="<?= set_value('fecha_salida_centro') ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ase <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="ase" value="<?= set_value('ase') ?>">
                            </div>
                        </div>

                    </div>

                    <br /><br /><br />
                    <!-- Quinta linea -->
                    <div class="form-group">
                        <div class="col-xs-9">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cotización <span style="color:red;">*</span></label><br />
                                <textarea class="form-control" rows="3" placeholder="Observaciones..." name="observaciones"><?= set_value('observaciones') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <br /><br /><br />
                    <br /><br /><br />

                    <!-- Datos centro aislamiento -->

                    <div class="box-header">
                        <h3 class="box-title">Centro aislamiento</h3>
                    </div>

                    <!-- Primera extraccion -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">1ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="fecha_extraccion_centro_1" name="fecha_extraccion_centro_1" value="<?= set_value('fecha_extraccion_centro_1') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hora 1ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="hora_extraccion_centro_1" name="hora_extraccion_centro_1" value="<?= set_value('hora_extraccion_centro_1') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleInputPassword1">Resultados 1ª extracción <span style="color:red;">*</span></label><br />
                                    <select id="resultados_extraccion_centro_1" name="resultados_extraccion_centro_1" class="form-control">
                                        <option>Resultados</option>
                                        <option value="positivo">Positivo</option>
                                        <option value="negativo">Negativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br /><br /><br />

                    <!-- Segunda extraccion -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="fecha_extraccion_centro_2" name="fecha_extraccion_centro_2" value="<?= set_value('fecha_extraccion_centro_2') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hora 2ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="hora_extraccion_centro_2" name="hora_extraccion_centro_2" value="<?= set_value('hora_extraccion_centro_2') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleInputPassword1">Resultados 2ª extracción <span style="color:red;">*</span></label><br />
                                    <select id="resultados_extraccion_centro_2" name="resultados_extraccion_centro_2" class="form-control">
                                        <option>Resultados</option>
                                        <option value="positivo">Positivo</option>
                                        <option value="negativo">Negativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br /><br /><br />

                    <!-- Tercera extraccion -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">3ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="fecha_extraccion_centro_3" name="fecha_extraccion_centro_3" value="<?= set_value('fecha_extraccion_centro_3') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hora 1ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="hora_extraccion_centro_3" name="hora_extraccion_centro_3" value="<?= set_value('hora_extraccion_centro_3') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleInputPassword1">Resultados 3ª extracción <span style="color:red;">*</span></label><br />
                                    <select id="resultados_extraccion_centro_3" name="resultados_extraccion_centro_3" class="form-control">
                                        <option>Resultados</option>
                                        <option value="positivo">Positivo</option>
                                        <option value="negativo">Negativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Datos Ganadería origen -->
                    <div class="box-header">
                        <h3 class="box-title">Ganadería de orígen</h3>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">1ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="fecha_extraccion_ganaderia_1" name="fecha_extraccion_ganaderia_1" value="<?= set_value('fecha_extraccion_ganaderia_1')?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hora 1ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="hora_extraccion_ganaderia_1" name="hora_extraccion_ganaderia_1" value="<?= set_value('hora_extraccion_ganaderia_1')?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleInputPassword1">Resultados 1ª extracción <span style="color:red;">*</span></label><br />
                                    <select id="resultados_extraccion_ganaderia_1" name="resultados_extraccion_ganaderia_1" class="form-control">
                                        <option>Resultados</option>
                                        <option value="positivo">Positivo</option>
                                        <option value="negativo">Negativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br /><br /><br />

                    <!-- Segunda extraccion -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="fecha_extraccion_ganaderia_2" name="fecha_extraccion_ganaderia_2" value="<?= set_value('fecha_extraccion_ganaderia_2')?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hora 2ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="hora_extraccion_ganaderia_2" name="hora_extraccion_ganaderia_2" value="<?= set_value('hora_extraccion_ganaderia_2') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleInputPassword1">Resultados 2ª extracción <span style="color:red;">*</span></label><br />
                                    <select id="resultados_extraccion_ganaderia_2" name="resultados_extraccion_ganaderia_2" class="form-control">
                                        <option>Resultados</option>
                                        <option value="positivo">Positivo</option>
                                        <option value="negativo">Negativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br /><br /><br />

                    <!-- Tercera extraccion -->
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">3ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="fecha_extraccion_ganaderia_3" name="fecha_extraccion_ganaderia_3" value="<?= set_value('fecha_extraccion_ganaderia_3') ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hora 1ª extracción <span style="color:red;">*</span></label><br />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="hora_extraccion_ganaderia_3" name="hora_extraccion_ganaderia_3" value="<?= set_value('hora_extraccion_ganaderia_3') ?>" class="form-control"¡>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="exampleInputPassword1">Resultados 3ª extracción <span style="color:red;">*</span></label><br />
                                    <select id="resultados_extraccion_ganaderia_" name="resultados_extraccion_ganaderia_3" class="form-control">
                                        <option>Resultados</option>
                                        <option value="positivo">Positivo</option>
                                        <option value="negativo">Negativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br /><br /><br />
                    <!-- Observaciones  extracciones-->
                    <div class="form-group">
                        <div class="col-xs-9">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Observaciones extracciones <span style="color:red;">*</span></label><br />
                                <textarea class="form-control" rows="3" placeholder="Observaciones..." name="observaciones_extraccion_centro"><?= set_value('observaciones_extraccion_centro') ?></textarea>
                            </div>
                        </div>
                    </div>

                <br /><br /><br /><br /><br />
                </div><!-- End div body-->

                <div class="box-footer">
                    <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</section>
<script type="text/javascript">
$( document ).ready(function() {
    $('#guardar').click(function() {
        $("#form_nuevo_caballo").submit();
    })


});

</script>
</body>
</html>