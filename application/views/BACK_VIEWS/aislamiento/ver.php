<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message"><?= $message ?></div>
    <?php endif; ?>
	<div id="header_content">
	<h3>Centro: <b><?= $centro->nombre ?> </b></h3>
	</div>
	<div class="table_view" >
    <form action="<?= site_url("/aislamiento/ver_centro/".$centro->id)?>" method="post">
        <table>
            <tr>
                <td>NIF</td>
                <td><input type="text" id="nif" name="nif" value="<?= $centro->nif ?>"></td>
                <td>Nombre</td>
                <td colspan="5"><input type="text" name="nombre" value="<?= $centro->nombre ?>" style="width:97%;"></td>
            </tr>
            <tr>
                <td>Dirección</td>   
                <td colspan="3"><input type="text" name="direccion" value="<?= $centro->direccion ?>" style="width:95%;"></td>
                <td>Población</td>
                <td><input type="text" name="poblacion" value="<?= $centro->poblacion ?>"></td>
                <td>CP</td>
                <td><input type="text" name="cp" value="<?= $centro->cp ?>"></td>
            </tr>
            <tr>
                <td>Teléfono del centro</td>
                <td><input type="text" name="telefono_centro" value="<?= $centro->telefono_centro ?>"></td>
                <td>Email del centro</td>
                <td><input type="text" name="email_centro" value="<?= $centro->email_centro ?>"></td>
                <td>Código REGA</td>
                <td><input type="text" name="codigo_rega" value="<?= $centro->codigo_rega ?>"></td>
                <td>Marca oficial</td>
                <td><input type="text" name="marca_oficial" value="<?= $centro->marca_oficial ?>"></td>
            </tr>
            <tr>
                <td>Responsable</td>
                <td><input type="text" name="responsable" value="<?= $centro->responsable ?>"></td>
                <td>Email del responsable</td>
                <td><input type="text" name="email_responsable" value="<?= $centro->email_responsable ?>"></td>
                <td>Teléfono del responsable</td>
                <td><input type="text" name="telefono_responsable" value="<?= $centro->telefono_responsable ?>"></td>
                <td>Num boxes</td>
                <td>
                    <select id="num_boxes" name="num_boxes">
                        <option>¿Num boxes?</option>
                        <?php for ($i=0; $i < 50; $i++) : ?>
                            <option value="<?= $i ?>" <?= $centro->num_boxes == $i ? "selected='selected'" : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>¿Infermería?</td>
                <td><select name="infermeria" id="infermeria">
                    <option selected="">Selecciona</option>
                    <option value="si" <?= $centro->infermeria == 'si' ? "selected" : '' ?>>Sí</option>
                    <option value="no" <?= $centro->infermeria == 'no' ? "selected" : '' ?>>No</option>
                    </select>   
                </td>
                <td>Observaciones</td>
                <td colspan="5">
                    <textarea rows="4" cols="80" name="observaciones"><?= $centro->observaciones ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Imágenes del centro</td>
                <td colspan="7"> 
                <?php foreach ($imagenes as $imagen) : ?>
                    <div id="imagen">
                        <a class="fancybox" rel="group" href="<?= site_url($imagen->url)?>"><img width="20%"src="<?= site_url($imagen->url)?>"/></a>
                    </div>
                <?php endforeach; ?>
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
    </div>
    </form>
</div>

<script type="text/javascript">
$( document ).ready(function() {
    $('input[type=text]').attr("disabled",true);
    $('#infermeria').attr("disabled",true);
    $('textarea').attr("disabled",true);
    $('#guardar').hide();

    $('#editar').click(function(){
        $('#guardar').show();
        $('#editar').hide();
        $('input[type=text]').attr("disabled",false);
        $('textarea').attr("disabled",false);
        $('#infermeria').attr("disabled",false);
    });

    $(".fancybox").fancybox({
        openEffect  : 'elastic',
        closeEffect : 'elastic',
        openSpeed   : "fast",
        closeSpeed  : "fast" 
    });
});

</script>
</body>
</html>	