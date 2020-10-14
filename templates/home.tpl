    {include 'header.tpl'}
        
    {include 'carrusel.tpl'}
        
        <h1>NUESTRAS HABITACIONES</h1>
        <p>En nuestro hotel todas las habitaciones cuentan con Caja Fuerte, Placard, Ropa Blanca, calefacción por Losa Radiante, TV por cable y Aire acondicionado (Excepto las estándar).</p>

        <span>CONOCELAS…</span>
        
        
        <ul class="list-group mt-5">
        {foreach from=$categorias item=cat}
            <li class="list-group-item" id="link-nombre-cat">
                <a href="mostrar_categoria/{$cat->id}">{$cat->nombre}</a>
            </li>
        {/foreach}
        </ul> 
        <br/>
        <!--div class="panel panel-default">
			<div class="panel-heading">
				 <h4 class="panel-title">Buscar la indicada..</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					{foreach from=$categorias item=cat}
                        <div class="col-md-2 col-sm-4 col-xs-6">                    
                            <a href="mostrar_categoria/{$cat->id}" class="thumbnail">
                            <img src="img/images.jpg" alt="imagen relacionada a la categoria">
                            </a>
                            <span id="categoria">{$cat->nombre}</span>                    
                        </div>
                    {/foreach}
				</div>
            </div>
         </div>

         <div class="col-md-2 col-sm-4 col-xs-3">
         <div class="card mb-3">
            <h3 class="card-header">Estandar</h3>
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
              </div>
              <img style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
              </ul>
              <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
        </div-->
</main>      
    {include file='footer.tpl'}
