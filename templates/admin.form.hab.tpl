<!-- ADMINISTRADOR: formulario de alta/edición de habitación en el hotel -->
{include file= 'admin.header.tpl'}
<section class="container fondo_container">
    <form action="insertar" method="POST" class="my-4">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group-row">

                    <label>Nro de habitación:</label>
                    <input name="nro_habitacion" type="number" class="form-control" 
                    {if $habitacion} 
                        value={$habitacion->nro}
                    {else}
                        value = ' '
                    {/if}
                    >
                    <label>Capacidad de personas:</label>
                    <input name="capacidad" type="number" class="form-control" 
                    {if $habitacion} 
                        value={$habitacion->capacidad}
                    {else}
                        value = ' '
                    {/if}
                    >
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                    <label>Categoria</label>
                    <select name="categoria" class="form-control">
                        {if $habitacion}
                            <option selected>{$habitacion->nombre_cat}</option>
                        {else}
                            <option selected> </option>
                        {/if}

                    </select>

                    <label>Estado:</label>
                    <select name="estado" class="form-control">
                        {if $habitacion}
                            {html_options values=$estado output=$estado selected=$estado_selec}
                        {else}
                            {html_options values=$estado output=$estado}
                        {/if}

                    </select>
                </div>
            </div>
        </div>
        <div class="btn-group m-5">
            {if $habitacion}
                <a class='btn btn-success btn-sm' href='actualiz_hab/{$habitacion->id}'>Guardar</a>
            {else}
                {* <a class='btn btn-success btn-sm' href='crear_hab/{$habitacion}'>Guardar</a> *}
            {/if}
        </div>
        <div class="btn-group m-5">
            <a class='btn btn-info btn-sm' href="{BASE_URL}admhab">Volver</a>
        </div>
    </form>
</section>
</main>
{include file='footer.tpl'}
</body>

</html>