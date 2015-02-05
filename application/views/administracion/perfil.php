<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message"><?= $message ?></div>
    <?php endif; ?>
	<div id="header_content">
	<h3>Información de tu perfil</b></h3>
	</div>
	<div class="table_view" ><?= print('<pre>');print_r($usuario);?>
    <!--<form action="<?= site_url("/caballos/guardar_caballo/".$caballo->id)?>" method="post">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?= $caballo->id_caballo ?>"></td>
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?= $caballo->nombre ?>"></td>
                <td>Raza</td>
                <td>
                    <select name="id_raza">
                        <option>Select one</option>
                    <?php foreach ($razas as $raza) : ?>
                        <option value="<?= $raza->id ?>" <?= $raza->id == $caballo->id_raza ? "selected" : '' ?> ><?= $raza->raza ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
                <td>Propietario</td>
                <td><input type="text" name="propietario" value="<?= $caballo->propietario ?>"></td>
            </tr>
            <tr>
                <td>Sexo</td>   
                <td><input type="text" name="sexo" value="<?= $caballo->sexo ?>"></td>
                <td>Capa</td>
                <td><input type="text" name="capa" value="<?= $caballo->capa ?>"></td>
                <td>Pasaporte</td>
                <td><input type="text" name="pasaporte" value="<?= $caballo->pasaporte ?>"></td>
                <td>Microchip</td>
                <td><input type="text" name="microchip" value="<?= $caballo->microchip ?>"></td>
            </tr>
            <tr>
                <td>Fecha nacimiento</td>
                <td><input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= date("d-m-Y",$caballo->fecha_nacimiento) ?>"></td>
                <td>País destino</td>
                <td><input type="text" name="destino" value="<?= $caballo->destino ?>"></td>
                <td>Ganaderia de origen</td>
                <td><input type="text" name="ganaderia_origen" value="<?= $caballo->ganaderia_origen ?>"></td>
                <td>Cotización</td>
                <td><input type="text" name="num_cotizacion" value="<?= $caballo->num_cotizacion ?>"></td>
            </tr>
            <tr>
                <td>Observaciones</td>
                <td colspan="3">
                    <textarea rows="4" cols="50"><?= $caballo->observaciones ?></textarea>
                </td>
                <td>Acciones</td>
                <td colspan="4">
                    <input type="button" id="editar" value="editar" class="button">  
                    <input type="submit" id="guardar" value="guardar" class="button_save">
                </td>               
            </tr>
        </table>
    </div>
    </form>-->
</div>
<script type="text/javascript">
$( document ).ready(function() {
    $('input[type=text]').attr("disabled",true);
    $('#raza').attr("disabled",true);
    $('textarea').attr("disabled",true);
    $('#guardar').hide();

    $('#editar').click(function(){
        $('#guardar').show();
        $('#editar').hide();
        $('input[type=text]').attr("disabled",false);
        $('textarea').attr("disabled",false);
        $('#raza').attr("disabled",false);

    });
});

</script>
</body>
</html>	