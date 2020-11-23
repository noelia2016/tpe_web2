    {include 'admin.header.tpl'}
    <section class="container-fluid fondo_container">
     <div class="row">
        <div class="col-12">    
            <h2>Comentarios sobre Habitaciones</h2>
            {if (!empty($mensaje) && isset($mensaje))}
                <div class="alert alert-dismissible alert-warning">
                    <h4 class="alert-heading">Datos erróneos</h4>
                    <p>{$mensaje}</p>
                </div>
            {/if}
            {if (!empty($mensajeBien) && isset($mensajeBien))}
                <div class="alert alert-dismissible alert-success" role="alert">
                    <h4 class="alert-heading">Datos actualizados</h4>
                    <p>{$mensajeBien}</p>
                </div>
            {/if}
            {include file="vue/admin.lista.comen.vue"}
        </div>
    </section>    
    <script src="js/admin.comentarios.js"></script>
    {include file='footer.tpl'}
