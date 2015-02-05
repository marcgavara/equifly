<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
<script>
$( document ).ready(function() {
    $("#fecha_nacimiento").datepicker();
});
</script>
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
	<h3>Información del caballo <b><?= $caballo->nombre ?> </b></h3>
	</div>
	<div class="table_view" >
    <form action="<?= site_url("/caballos/ver/".$caballo->id)?>" method="post">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?= $caballo->id_caballo ?>" readonly></td>
                <td>Nombre <span style="color:red;">*</span></td>
                <td><input type="text" name="nombre_caballo" value="<?= $caballo->nombre ?>"></td>
                <td>Raza <span style="color:red;">*</span></td>
                <td>
                    <select name="id_raza">
                        <option>Select one</option>
                    <?php foreach ($razas as $raza) : ?>
                        <option value="<?= $raza->id ?>" <?= $raza->id == $caballo->id_raza ? "selected" : '' ?> ><?= $raza->raza ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
                <td>Propietario <span style="color:red;">*</span></td>
                <td><input type="text" name="propietario" value="<?= $caballo->propietario ?>"></td>
            </tr>
            <tr>
                <td>Sexo <span style="color:red;">*</span></td>   
                <td>
                    <select id="sexo" name="sexo">
                        <option>¿Sexo?</option>
                        <option value="macho" <?= $caballo->sexo == 'macho' ? "selected='selected'" : '' ?>>Macho</option>
                        <option value="hembra" <?= $caballo->sexo == 'hembra' ? "selected='selected'" : '' ?>>Hembra</option>
                    </select>
                </td>
                <td>Capa <span style="color:red;">*</span></td>
                <td>
                    <select name="id_capa">
                        <option>¿Capa?</option>
                    <?php foreach ($capas as $capa) : ?>
                        <option value="<?= $capa->id ?>" <?= $caballo->id_capa == $capa->id ? "selected='selected'" : "" ?>><?= $capa->capa ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
                <td>Pasaporte <span style="color:red;">*</span></td>
                <td><input type="text" name="pasaporte" value="<?= $caballo->pasaporte ?>"></td>
                <td>Microchip <span style="color:red;">*</span></td>
                <td><input type="text" name="microchip" value="<?= $caballo->microchip ?>"></td>
            </tr>
            <tr>
                <td>Fecha nacimiento <span style="color:red;">*</span></td>
                <td><input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= date("d-m-Y",$caballo->fecha_nacimiento) ?>"></td>
                <td>País destino <span style="color:red;">*</span></td>
                <td>
                    <select id="id_pais_destino" name="id_pais_destino">
                        <option value="">¿País?</option>
                        <?php foreach ($paises as $pais) : ?>
                            <option value="<?= $pais->id ?>" <?= $caballo->id_pais_destino == $pais->id ? 'selected="selected"' : '' ?>><?= $pais->pais ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>Fecha recogida <span style="color:red;">*</span></td>
                <td><input type="text" name="fecha_recogida" id="fecha_recogida" value="<?= date("d-m-Y",$caballo->fecha_recogida) ?>"></td>
                <td>Ganaderia origen <span style="color:red;">*</span></td>
                <td>
                    <select id="id_ganaderia_origen" name="id_ganaderia_origen">
                        <option value="">¿Ganaderia origen?</option>
                        <?php foreach ($ganaderias as $ganaderia) : ?>
                            <option value="<?= $ganaderia->id ?>" <?= $caballo->id_ganaderia_origen == $ganaderia->id ? 'selected="selected"' : '' ?>><?= $ganaderia->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Observaciones <span style="color:red;">*</span></td>
                <td colspan="7">
                    <textarea rows="4" cols="50" name="observaciones" style="width: 97%;"><?= $caballo->observaciones ?></textarea>
                </td>            
            </tr>
            </tr>
                <td>Fecha entr Centr Aisl <span style="color:red;">*</span></td>
                <td><input type="text" id="fecha_entrada_centro" name="fecha_entrada_centro" value="<?= date("d-m-Y",$caballo->fecha_entrada_centro) ?>"></td>
                <td>Centro aislamiento <span style="color:red;">*</span></td>
                <td>
                    <select name="id_centro_aislamiento">
                        <option>¿Centro aislamiento?</option>
                        <?php foreach ($centros_asilamiento as $centro) : ?>
                            <option value="<?= $centro->id ?>" <?= $caballo->id_ganaderia_origen == $centro->id ? 'selected="selected"' : '' ?>><?= $centro->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>Fecha prevista salida <span style="color:red;">*</span></td>
                <td><input type="text" id="fecha_salida_centro" name="fecha_salida_centro" value="<?= date("d-m-Y",$caballo->fecha_salida_centro) ?>"></td>
                <td>Cotización <span style="color:red;">*</span></td>
                <td><input type="text" name="num_cotizacion" value="<?= $caballo->num_cotizacion ?>"></td>
            </tr>
            <tr>
                <td colspan="9">Centro aislamiento:</td>
            </tr>
            <tr>
                <td>ASE</td>
                <td colspan="7"><input type="text" name="ase" value="<?= $caballo->ase ?>"></td>
            </tr>
            <tr>
                <td>1ª extracción</td>
                <td colspan="3">
                    <label>Fecha</label><input type="text" id="fecha_extraccion_centro_1" name="fecha_extraccion_centro_1" value="<?= $caballo->cae_extraccion_1 ? date("Y-m-d", $caballo->cae_extraccion_1) : ""?>">
                    <label>Hora</label><input type="text" id="hora_extraccion_centro_1" name="hora_extraccion_centro_1" value="<?= $caballo->cae_extraccion_1 ? date("H:i", $caballo->cae_extraccion_1) : "" ?>" maxlength="5">
                    <label>Resultados</label><select id="resultados_extraccion_centro_1" name="resultados_extraccion_centro_1">
                        <option value="">---</option>
                        <option value="positivo" <?= $caballo->cae_resultado_1 == 'positivo' ? "selected='selected'" : "" ?>>Positivo</option>
                        <option value="negativo" <?= $caballo->cae_resultado_1 == 'negativo' ? "selected='selected'" : "" ?>>Negativo</option>
                    </select>
                </td>
                <td rowspan="3">OBSERVACIONES</td>
                <td rowspan="3" colspan="3">
                    <textarea id="observaciones_extraccion_centro" name="observaciones_extraccion_centro" style="width: 90%;height:90%;"><?= $caballo->cae_observaciones ?></textarea>
                </td>
            </tr>
            <tr>
                <td>2ª extracción</td>
                <td colspan="3">
                    <label>Fecha</label><input type="text" id="fecha_extraccion_centro_2" name="fecha_extraccion_centro_2" value="<?= $caballo->cae_extraccion_2 ? date("Y-m-d", $caballo->cae_extraccion_2) : ""?>">
                    <label>Hora</label><input type="text" id="hora_extraccion_centro_2" name="hora_extraccion_centro_2" value="<?= $caballo->cae_extraccion_2 ? date("H:i", $caballo->cae_extraccion_2) : ""?>" maxlength="5">
                    <label>Resultados</label><select id="resultados_extraccion_centro_2" name="resultados_extraccion_centro_2">
                        <option value="">---</option>
                        <option value="positivo" <?= $caballo->cae_resultado_2 == 'positivo' ? "selected='selected'" : "" ?>>Positivo</option>
                        <option value="negativo" <?= $caballo->cae_resultado_2 == 'negativo' ? "selected='selected'" : "" ?>>Negativo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>3ª extracción</td>
                <td colspan="3">
                    <label>Fecha</label><input type="text" id="fecha_extraccion_centro_3" name="fecha_extraccion_centro_3" value="<?= $caballo->cae_extraccion_3 ? date("Y-m-d", $caballo->cae_extraccion_3) : ""?>">
                    <label>Hora</label><input type="text" id="hora_extraccion_centro_3" name="hora_extraccion_centro_3" value="<?= $caballo->cae_extraccion_3 ? date("H:i", $caballo->cae_extraccion_3) : ""?>" maxlength="5">
                    <label>Resultados</label><select id="resultados_extraccion_centro_3" name="resultados_extraccion_centro_3">
                        <option value="">---</option>
                        <option value="positivo" <?= $caballo->cae_resultado_3 == 'positivo' ? "selected='selected'" : "" ?>>Positivo</option>
                        <option value="negativo" <?= $caballo->cae_resultado_3 == 'negativo' ? "selected='selected'" : "" ?>>Negativo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="9">Ganaderia de origen:</td>
            </tr>
            <tr>
                <td>1ª extracción</td>
                <td colspan="3">
                    <label>Fecha</label><input type="text" id="fecha_extraccion_ganaderia_1" name="fecha_extraccion_ganaderia_1" value="<?= $caballo->ge_extraccion_3 ? date("Y-m-d", $caballo->ge_extraccion_1) : ""?>">
                    <label>Hora</label><input type="text" id="hora_extraccion_ganaderia_1" name="hora_extraccion_ganaderia_1" value="<?= $caballo->ge_extraccion_3 ? date("H:i", $caballo->ge_extraccion_1) : ""?>" maxlength="5">
                    <label>Resultados</label><select id="resultados_extraccion_ganaderia_1" name="resultados_extraccion_ganaderia_1">
                        <option value="">---</option>
                        <option value="positivo" <?= $caballo->ge_resultado_1 == 'positivo' ? "selected='selected'" : "" ?>>Positivo</option>
                        <option value="negativo" <?= $caballo->ge_resultado_1 == 'negativo' ? "selected='selected'" : "" ?>>Negativo</option>
                    </select>
                </td>
                <td rowspan="3">OBSERVACIONES</td>
                <td rowspan="3" colspan="3">
                    <textarea id="observaciones_extraccion_ganaderia" name="observaciones_extraccion_ganaderia" style="width: 90%;height:90%;"><?= $caballo->ge_observaciones ?></textarea>
                </td>
            </tr>
            <tr>
                <td>2ª extracción</td>
                <td colspan="3">
                    <label>Fecha</label><input type="text" id="fecha_extraccion_ganaderia_2" name="fecha_extraccion_ganaderia_2" value="<?= $caballo->ge_extraccion_3 ? date("Y-m-d", $caballo->ge_extraccion_2) : ""?>">
                    <label>Hora</label><input type="text" id="hora_extraccion_ganaderia_2" name="hora_extraccion_ganaderia_2" value="<?= $caballo->ge_extraccion_3 ? date("H:i", $caballo->ge_extraccion_2) : ""?>" maxlength="5">
                    <label>Resultados</label><select id="resultados_extraccion_ganaderia_2" name="resultados_extraccion_ganaderia_2">
                        <option>---</option>
                        <option value="positivo" <?= $caballo->ge_resultado_2 == 'positivo' ? "selected='selected'" : "" ?>>Positivo</option>
                        <option value="negativo" <?= $caballo->ge_resultado_2 == 'negativo' ? "selected='selected'" : "" ?>>Negativo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>3ª extracción</td>
                <td colspan="3">
                    <label>Fecha</label><input type="text" id="fecha_extraccion_ganaderia_3" name="fecha_extraccion_ganaderia_3" value="<?= $caballo->ge_extraccion_3 ? date("Y-m-d", $caballo->ge_extraccion_3) : ""?>">
                    <label>Hora</label><input type="text" id="hora_extraccion_ganaderia_3" name="hora_extraccion_ganaderia_3" value="<?= $caballo->ge_extraccion_3 ? date("H:i", $caballo->ge_extraccion_3) : ""?>" maxlength="5">
                    <label>Resultados</label><select id="resultados_extraccion_ganaderia_3" name="resultados_extraccion_ganaderia_3">
                        <option>---</option>
                        <option value="positivo" <?= $caballo->ge_resultado_3 == 'positivo' ? "selected='selected'" : "" ?>>Positivo</option>
                        <option value="negativo" <?= $caballo->ge_resultado_3 == 'negativo' ? "selected='selected'" : "" ?>>Negativo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Acciones</td>
                <td colspan="7">
                    <input type="button" id="editar" value="editar" class="button">  
                    <input type="submit" id="guardar" value="guardar" class="button_save">
                </td>               
            </tr>

            <input type="hidden" id="id_extraccion_centro" name="id_extraccion_centro" value="<?= $caballo->id_extraccion_centro ?>">
            <input type="hidden" id="id_extraccion_ganaderia" name="id_extraccion_ganaderia" value="<?= $caballo->id_extraccion_ganaderia ?>">
            
        </table>
    </div>
    </form>
</div>
<script type="text/javascript">
$( document ).ready(function() {
    $('input[type=text]').attr("disabled",true);
    $('select').attr("disabled",true);
    $('#raza').attr("disabled",true);
    $('textarea').attr("disabled",true);
    $('#guardar').hide();

    $('#editar').click(function(){
        $('#guardar').show();
        $('#editar').hide();
        $('input[type=text]').attr("disabled",false);
        $('textarea').attr("disabled",false);
        $('#raza').attr("disabled",false);
        $('select').attr("disabled",false);

    });
});

</script>
</body>
</html>	