<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message" id="alert_message">
            <button type="button" class="close" id="close_message"><span aria-hidden="true">×</span></button>
            <?= $message ?>
        </div>
    <?php endif; ?>
	<div class="table_css" style="width:350px;display:inline-block;position:relative;float:left;">
        <table>
            <tr>
                <td>Tipo raza</td>
                <td>Acciones</td>
            </tr>
            <form action="<?= site_url("/administracion/razas_capas")?>" method="post">
                <tr>
                    <td colspan="3"><input type="text" id="raza" name="raza" style="width:60%;"/>
                    <input type="submit" id="buscar" value="Añadir raza" class="button" style="width:30%;"></td>
                </tr>
            </form>
            <?php foreach ($razas as $raza) : ?>
                <tr>
                    <td <?= $raza->deleted ? "style='color:red;font-weight:bold;'" : "" ?>><?= $raza->raza ?></td>
                    <td>
                        <a href="">Editar</a> | 
                        <?php if ($raza->deleted) : ?>
                            <a href="<?= site_url('/administracion/activar_raza/'.$raza->id) ?>">Activar</td>
                        <?php else : ?>
                            <a href="<?= site_url('/administracion/desactivar_raza/'.$raza->id) ?>">Desactivar</td>
                        <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div style="display:block;position:abolute;float:let;;">
        <div class="table_css" style="margin-left:50px;float:left;width:350px;display:inline-block;position:relative;">
            <table>
                <tr>
                    <td>Tipo capa</td>
                    <td>Acciones</td>
                </tr>
                <form action="<?= site_url("/administracion/razas_capas")?>" method="post">
                    <tr>
                        <td colspan="3"><input type="text" id="capa" name="capa" style="width:60%;"/>
                        <input type="submit" id="buscar" value="Añadir capa" class="button" style="width:30%;"></td>
                    </tr>
                </form>
                <?php foreach ($capas as $capa) : ?>
                    <tr>
                        <td <?= $capa->deleted ? "style='color:red;font-weight:bold;'" : "" ?>><?= $capa->capa ?></td>
                        <td>
                            <a href="">Editar</a> | 
                            <?php if ($capa->deleted) : ?>
                                <a href="<?= site_url('/administracion/activar_capa/'.$capa->id) ?>">Activar</td>
                            <?php else : ?>
                                <a href="<?= site_url('/administracion/desactivar_capa/'.$capa->id) ?>">Desactivar</td>
                            <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>




</div>
<script type="text/javascript">
$( document ).ready(function() {
});

</script>
</body>
</html>	