<div class="container">
    <?php if($message) : ?>
        <div class="alert_message"><?= $message ?></div>
    <?php endif; ?>
    <form action="<?= site_url("/ganaderia/nueva_ganaderia")?>" method="post">
        <input type="submit" id="editar" value="Nueva ganadería" class="button">  
    </form> 
	<div id="header_content">
	<h3>Ganaderías</h3>
	</div>    
	<div class="table_css" >
        <table >
            <tr>
                <td style="width:50px;">ID</td>
                <td>Nombre</td>
                <td>Teléfono</td>
                <td>Email</td>
                <td>Poblacion</td>
                <td>Responsable</td>
                <td>Dni responsable</td>
                <td>Acciones</td>
            </tr>

            <tr>
                <form action="<?= site_url("/ganaderias")?>" method="post">
                    <td style="width:120px;"><input type="text" name="filtro_id"></td>
                    <td style="width:150px;"><input type="text" name="filtro_nombre"></td>
                    <td style="width:150px;"><input type="text" name="filtro_telefono"></td>
                    <td style="width:150px;"><input type="text" name="filtro_email"></td>
                    <td style="width:150px;"><input type="text" id="filtro_poblacion"></td>
                    <td style="width:150px;"><input type="text" id="filtro_responsable"></td>
                    <td style="width:150px;"><input type="text" id="filtro_dni_responsable"></td>
                    <td><input type="submit" id="buscar" value="Buscar" class="button"></td>
                </form>
            </tr>
            <?php foreach ($ganaderias as $ganaderia) : ?>
            <tr>
                <td style="width:50px;"><?= $ganaderia->id ?></td>
                <td><?= $ganaderia->nombre ?></td>
                <td><?= $ganaderia->telefono ?></td>
                <td><?= $ganaderia->email ?></td>
                <td><?= $ganaderia->poblacion ?></td>
                <td><?= $ganaderia->responsable ?></td>
                <td><?= $ganaderia->dni_responsable ?></td>
                <td style="width:300px;" id="link">
                    <a href="<?= site_url("/ganaderia/ver/$ganaderia->id")?>"> Ver más</a> |
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>	