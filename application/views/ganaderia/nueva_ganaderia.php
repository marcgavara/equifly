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
    <form action="<?= site_url("/ganaderia/nueva_ganaderia")?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?= set_value('nombre') ?>"></td>
                <td>Dirección</td>   
                <td colspan="5"><input type="text" name="direccion" value="<?= set_value('direccion') ?>" style="width:97%;"></td>
            </tr>
            <tr>
                <td>Población</td>
                <td><input type="text" name="poblacion" value="<?= set_value('poblacion') ?>"></td>
                <td>Código postal</td>
                <td><input type="text" name="cp" value="<?= set_value('cp') ?>"></td> 
                <td>Teléfono</td>
                <td><input type="text" name="telefono" value="<?= set_value('telefono') ?>"></td>
                <td>Email</td>
                <td><input type="text" name="email" value="<?= set_value('email') ?>"></td>
            </tr>
            <tr>
                <td>Responsable ganadería</td>
                <td><input type="text" name="responsable" value="<?= set_value('responsable') ?>"></td>
                <td>Teléfono responsable</td>
                <td><input type="text" name="telefono_responsable" value="<?= set_value('telefono_responsable') ?>"></td> 
                <td>Email</td>
                <td><input type="text" name="email_responsable" value="<?= set_value('email_responsable') ?>"></td>
                <td>DNI</td>
                <td><input type="text" name="dni_responsable" value="<?= set_value('dni_responsable') ?>"></td>
            </tr>
            <tr>
                <td>Observaciones</td>
                <td colspan="7">
                    <textarea rows="4" cols="100%" name="observaciones"><?= set_value('observaciones') ?></textarea>
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
    
});

</script>
</body>
</html>	