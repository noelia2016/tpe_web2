<!-- formulario de alta de habitacion en el hotel -->
<form action="insertar" method="POST" class="my-4">
    <div class="form-group-row">
        <div class="col-9">
            <div class="form-group">
                <label>Nro de habitación:</label>
                <input name="nro_habitacion" type="number" class="form-control">
            </div>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label>Capacidad de personas:</label>
                <input name="capacidad" type="number" class="form-control">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria" class="form-control">
                    <?php foreach ($categorias as $cat) {
                        echo " <option value='$cat->id' >$cat->nombre</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label>Estado:</label>
                <select name="estado" class="form-control">
                    <option value="disponible">disponible</option>
                    <option value="ocupado">ocupado</option>
                    <option value="reservada">reservada</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>