<!-- EMPIEZA EL CUERPO -->
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message"><?= $message ?></div>
    <?php endif; ?>
    <form action="<?= site_url("/aislamiento/nuevo_centro")?>" method="post">
        <input type="submit" id="editar" value="Añadir nuevo centro" class="button">  
    </form> 
	<div id="header_content">
	<h3>Centros de aislamiento</h3>
	</div>
	<div class="table_css" >
        <table >
            <tr>
                <td style="width:50px;">ID</td>
                <td>Nif</td>
                <td>Nombre</td>
                <td>Email centro</td>
                <td>Teléfono centro</td>
                <td>Responsable</td>
                <td>Acciones</td>
            </tr>

            <?php foreach ($centros as $centro) : ?>
            <tr>
                <td style="width:50px;"><?= $centro->id ?></td>
                <td><?= $centro->nif ?></td>
                <td><?= $centro->nombre ?></td>
                <td><?= $centro->email_centro ?></td>
                <td><?= $centro->telefono_centro ?></td>
                <td><?= $centro->responsable ?></td>
                <td style="width:300px;" id="link">
                    <a href="<?= site_url("/aislamiento/ver_centro/$centro->id")?>">Ver más</a> |
                    <a href="<?= site_url("/aislamiento/eliminar_centro/$centro->id")?>">Eliminar</a> |
                </td>
            <?php endforeach; ?>
            </tr>
        </table>
    </div>
</div>
</script>
</body>
</html>	