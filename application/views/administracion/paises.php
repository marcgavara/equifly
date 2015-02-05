<div style="clear:both;"></div>
<!-- EMPIEZA EL CUERPO -->
<div class="container">
    <?php if($message) : ?>
        <div class="alert_message"><?= $message ?></div>
    <?php elseif($error) : ?>
        <div class="error_message"><?= $error ?></div>
    <?php endif; ?>
	<div id="header_content">
	<h3>Añadir país </b></h3>
	</div>
	<div class="table_view" >
    <form action="<?= site_url("/adminsitracion/guardar_pais")?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>País</td>
                <td><input type="text" name="pais" id="pais" value=""></td>
                <td>ASE</td>   
                <td><input type="text" name="ase" value="" name="ase"></td>
                <td>Días centro aislamiento</td>
                <td><input type="text" name="dias_centro_aislamiento" id="dias_centro_aislamiento" value=""></td>
                <td>Ver PDF ASE</td>
                <td>
                    <label>Sí</label><input type="checkbox" name="pdf_ase" id="pdf_ase" value="1"><br >
                    <   label>No</label><input type="checkbox" name="pdf_ase" id="pdf_ase" value="0"></td>
            </tr>
            <tr>
                <td>Pruebas a realizar antes de entrar en centro aislamiento</td>
                <td colspan="3">
                    <input placeholder="1. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="1. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="2. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="2. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="3. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="3. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="4. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="4. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="5. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="5. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="6. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="6. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="7. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="7. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="8. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="8. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="9. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="9. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <input placeholder="10. Enfermedad" type="text" name="enfermedad_centro_aislamiento[]" style="width:95%;"> <br />
                    <input placeholder="10. Método" type="text" name="metodo_centro_aislamiento[]" style="width:95%;"><br /><br />
                    <label>Cantidad de extracciones</label>
                        <select id="intervalo_extracciones">
                            <?php for ($i=1; $i < 25; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    <label>Intervalo de días</label>
                        <select id="intervalo_dias">
                            <?php for ($i=1; $i < 25; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                </td>
                <td>Pruebas a realizar durante al cuarentena</td>
                <td colspan="3">
                    <input placeholder="1. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="1. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="2. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="2. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="3. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="3. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="4. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="4. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="5. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="5. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="6. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="6. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="7. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="7. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="8. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="8. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="9. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="9. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <input placeholder="10. Enfermedad" type="text" name="enfermedad_cuarentena[]" style="width:95%;"> <br />
                    <input placeholder="10. Método" type="text" name="metodo_cuarentena[]" style="width:95%;"> <br /><br />
                    <label>Cantidad de extracciones</label>
                        <select id="intervalo_extracciones">
                            <?php for ($i=1; $i < 25; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    <label>Intervalo de días</label>
                        <select id="intervalo_dias">
                            <?php for ($i=1; $i < 25; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
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
    
});

</script>
</body>
</html>	