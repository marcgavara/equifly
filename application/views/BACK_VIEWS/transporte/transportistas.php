<!-- EMPIEZA EL CUERPO -->
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message"><?= $message ?></div>
    <?php endif; ?>
    <form action="<?= site_url("/transporte/nuevo_transportista")?>" method="post">
        <input type="submit" id="editar" value="Nuevo transportistas" class="button">  
    </form> 
	<div id="header_content">
	<h3>Listado de transportistas disponibles</h3>
	</div>
	<div class="table_css" >
        <table >
            <tr>
                <td style="width:50px;">ID</td>
                <td>Nombre</td>
                <td>Teléfono</td>
                <td>Población</td>
                <td>Tipo transporte</td>
                <td>Nº posiciones</td>
                <td>Acciones</td>
            </tr>

            <?php foreach ($transportistas as $transportista) : ?>
            <tr>
                <td style="width:50px;"><?= $transportista->id ?></td>
                <td><?= $transportista->nombre ?></td>
                <td><?= $transportista->telefono ?></td>
                <td><?= $transportista->poblacion ?></td>
                <td><?= $transportista->tipo_transporte ?></td>
                <td><?= $transportista->num_posiciones ?></td>
                <td style="width:300px;" id="link">
                    <a href="<?= site_url("/transporte/ver_transportista/$transportista->id")?>" >Ver más</a> |
                    <?php if ($transportista->deleted == 1) : ?>
                        <a href="<?= site_url("/transporte/activar/$transportista->id")?>" >Activar</a> |
                    <?php else : ?>
                        <a href="<?= site_url("/transporte/desactivar/$transportista->id")?>"> Desactivar</a> |
                    <?php endif; ?>
                </td>
            <?php endforeach; ?>
            </tr>
        </table>
    </div>
</div>
</script>
</body>
</html>	