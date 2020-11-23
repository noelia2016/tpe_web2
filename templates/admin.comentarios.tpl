{include file='admin.header.tpl'}
        <section class="container-fluid fondo_container">           
            {* va a mostrar los comentarios para dicha habitacion*}
            <div class="col mt-3 mb-1">
                {include file="vue/comentario.ABM.vue"}
            </div>
            </div>
            {* fin de mostrar los comentarios de la habitacion *}
        </section>
    </main>
    <!-- incluyo JS para CSR -->
    <script src="js/admin.comentarios.js"></script>
{include file='footer.tpl'}
