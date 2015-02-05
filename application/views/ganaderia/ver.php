<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
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
	<h3>Datos nueva ganadería </b></h3>
	</div>
	<div class="table_view" >
    <form action="<?= site_url("/ganaderia/ver/".$ganaderia->id)?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?= $ganaderia->nombre  ?>"></td>
                <td>Dirección</td>   
                <td colspan="5"><input type="text" name="direccion" value="<?= $ganaderia->direccion ?>" style="width:97%;"></td>
            </tr>
            <tr>
                <td>Población</td>
                <td><input type="text" name="poblacion" value="<?= $ganaderia->poblacion  ?>"></td>
                <td>Código postal</td>
                <td><input type="text" name="cp" value="<?= $ganaderia->cp  ?>"></td> 
                <td>Teléfono</td>
                <td><input type="text" name="telefono" value="<?= $ganaderia->telefono  ?>"></td>
                <td>Email</td>
                <td><input type="text" name="email" value="<?= $ganaderia->email  ?>"></td>
            </tr>
            <tr>
                <td>Responsable ganadería</td>
                <td><input type="text" name="responsable" value="<?= $ganaderia->responsable  ?>"></td>
                <td>Teléfono responsable</td>
                <td><input type="text" name="telefono_responsable" value="<?= $ganaderia->telefono_responsable  ?>"></td> 
                <td>Email</td>
                <td><input type="text" name="email_responsable" value="<?= $ganaderia->email_responsable  ?>"></td>
                <td>DNI</td>
                <td><input type="text" name="dni_responsable" value="<?= $ganaderia->dni_responsable  ?>"></td>
            </tr>
            <tr>
                <td>Observaciones</td>
                <td colspan="7">
                    <textarea rows="4" cols="100%" name="observaciones"><?= $ganaderia->observaciones  ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Más responsables</td>
                <td colspan="7">
                    <b><label>Nombre</label></b> <input style="width:200px;" type="text" id="otros_responsables_nombre[]" name="otros_responsables_nombre[]" value="" > 
                    <b><label>Telefono</label></b> <input style="width:100px;" type="text" id="otros_responsables_telefono[]" name="otros_responsables_telefono[]" value="" > 
                    <label id="mas_responsables"><a>[+]</a></label>
                    <div id="responsables_anadidos"></div>
                </td>
            </tr>
            <tr>
                <td>Acciones</td>
                <td colspan="7">
                    <input type="button" id="editar" value="editar" class="button">  
                    <input type="submit" id="guardar" value="guardar" class="button_save">
                </td>               
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#mas_responsables').click(function(){
        alert("3");
        $( "#responsables_anadidos" ).append( "<div style='float:left;'><b><label>Nombre</label></b><input style='width:200px;' type='text' name='otros_responsables_nombre[]' value=''><b><label>Teléfono</label></b><input type='text' name='otros_responsables_telefono[]' value=''></div>");
    });

    $('input[type=text]').attr("disabled",true);
    $('textarea').attr("disabled",true);
    $('#guardar').hide();

    $('#editar').click(function(){
        $('#guardar').show();
        $('#editar').hide();
        $('input[type=text]').attr("disabled",false);
        $('textarea').attr("disabled",false);
    });

});

</script>
</body>
</html>	