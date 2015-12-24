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
                <h3 class="box-title">Añada nuev567as razas</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <!-- Primera línea -->
                <form role="form" action="<?= site_url("/administracion/razas_capas")?>" method="post" id="">
                    <div class="form-group">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nueva raza <span style="color:red;">*</span></label><br />
                                <input class="form-control" type="text" name="raza" value="<?= set_value('raza') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success" id="guardar">Guardar</button>
                    </div>
                </form>
                <?php foreach ($razas as $raza) : ?>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?= $raza->deleted ? "style='color:red;font-weight:bold;'" : "" ?>><?= $raza->raza ?></label><br />
                                <a href="">Editar</a> |
                                <?php if ($raza->deleted) : ?>
                                    <a href="<?= site_url('/administracion/activar_raza/'.$raza->id) ?>">Activar</a>
                                <?php else : ?>
                                    <a href="<?= site_url('/administracion/desactivar_raza/'.$raza->id) ?>">Desactivar</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>


<!--<div style="clear:both;"></div>
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
</html>	-->