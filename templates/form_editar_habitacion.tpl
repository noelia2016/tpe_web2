    {include 'header.tpl'}
    
    {include file='form_crear_habitacion.tpl'} 
    
    <!-- formulario de alta/edición categoria de habitacion en el hotel -->
    <form action="insertar" method="POST" class="my-4">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                    <label>Categoria</label>
                    <textarea name="descripcion" class="form-control" rows="1"></textarea>
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    {include file='footer.tpl'}