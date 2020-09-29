<!-- formulario de alta de habitacion en el hotel -->
<form action="insertar" method="POST" class="my-4">
    <div class="row mt-5">
        <div class="col-12 col-sm-6">
            <div class="form-group-row">

                <label>Nro de habitación:</label>
                <input name="nro_habitacion" type="number" class="form-control">

                <label>Capacidad de personas:</label>
                <input name="capacidad" type="number" class="form-control">
            </div>
        </div>
        <div class="col-12 col-sm-6">

            <div class="form-group-row">
                <label>Categoria</label>
                <select name="categoria" class="form-control">

                </select>

                <label>Estado:</label>
                <select name="estado" class="form-control">
                    <option value="disponible">disponible</option>
                    <option value="ocupada">ocupado</option>
                    <option value="reservada">reservada</option>
                </select>
            </div>
        </div>
    </div>
    <div class="btn-group my-3">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>