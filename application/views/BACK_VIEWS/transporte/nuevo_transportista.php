<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message"><?= $message ?></div>
    <?php elseif($error) : ?>
        <div class="error_message"><?= $error ?></div>
    <?php endif; ?>
	<div id="header_content">
	<h3>Datos nuevo transportista </b></h3>
	</div>
	<div class="table_view" >
    <form action="<?= site_url("/transporte/guardar_transportista")?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nombre</td>
                <td colspan="5"><input type="text" name="nombre" value="" style="width:97%;"></td>
                <td>Teléfono</td>   
                <td><input type="text" name="telefono" value=""></td>
            </tr>
            <tr>
                <td>Población</td>
                <td><input type="text" name="poblacion" value=""></td>
                <td>Código ETA</td>
                <td><input type="text" name="codigo_eta" value=""></td>
                <td>Tipo transporte</td>
                <td>
                    <select name="tipo_transporte">
                    <option selected="">Selecciona</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                    </select>
                </td>   
                <td>Num posiciones</td>
                <td><input type="text" name="num_posiciones" value=""></td>
            </tr>
            <tr>
                <td>Observaciones</td>
                <td colspan="7">
                    <textarea rows="4" cols="100%" name="observaciones"></textarea>
                </td>
            </tr>
            <tr>
                <td>Camiones</td>
                <td colspan="3">
                    <b><label>Camión</label></b> 
                    <select id="camion[]" name="camion[]"> 
                        <option selected>Tipo</option>
                        <option value="camion_pequeno">Camión pequeño</option>
                        <option value="camion_grande">Camión gande</option>
                        <option value="camion_remolque">Camión + remolque</option>
                        <option value="remolque">Remolque</option>
                    </select> 
                    <b><label>Matrícula</label></b> <input style="width:100px;" type="text" id="matricula[]" name="matricula[]" value="" > 
                    <label id="mas_matriculas"><a>[+]</a></label>
                    <div id="matriculas_anadidas"></div>
                </td>
                <td>Datos chóferes</td>   
                <td colspan="4">
                    <b><label>Nombre</label></b>
                    <input type="text" name="choferes[]" value="">
                    <b><label>DNI</label></b>
                    <input type="text" name="dni_choferes[]" value=""> 
                    <label id="mas_choferes"><a>[+]</a></label>
                    <div id="choferes_anadidos"></div>
                </td>
            </tr>
            <tr>
                <td>Acciones</td>
                <td colspan="7">
                    <input type="submit" id="guardar" value="guardar" class="button_save">
                </td>               
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#mas_matriculas').click(function(){
        $( "#matriculas_anadidas" ).append( "<div style='float:left;'><b><label>Camión</label></b> <select name='camion[]'>  <option selected>Tipo</option><option value='camion_pequeno'>Camión pequeño</option><option value='camion_grande'>Camión gande</option><option value='camion_remolque'>Camión + remolque</option><option value='remolque'>Remolque</option></select><b><label>Matrícula</label></b> <input style='width:100px;' type='text' name='matricula[]' value='' > </div>");
    });
    $('#mas_choferes').click(function(){
        $( "#choferes_anadidos" ).append( "<b><label>Nombre</label></b><input type='text' name='choferes[]' value=''><b><label>DNI</label></b><input type='text' name='dni_choferes[]' value=''>" );
    });
    
});

</script>
</body>
</html>	