<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 22:52:45
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f76419d29ee36_14204904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13655eae936abb887e62557be9906a8c5be59b3e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\home.tpl',
      1 => 1601585558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:carrusel.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f76419d29ee36_14204904 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
    <?php $_smarty_tpl->_subTemplateRender('file:carrusel.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
        <h1>NUESTRAS HABITACIONES</h1>
        <p>En nuestro hotel todas las habitaciones cuentan con Caja Fuerte, Placard, Ropa Blanca, calefacción por Losa Radiante, TV por cable y Aire acondicionado (Excepto las estándar).</p>

        <span>CONOCELAS…</span>
        
        
        <ul class="list-group mt-5">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
            <li class="list-group-item">
                <a href="mostrar_categoria/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value->nombre;?>
</a>
            </li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul> 
        <br/>
        <!--div class="panel panel-default">
			<div class="panel-heading">
				 <h4 class="panel-title">Buscar la indicada..</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                        <div class="col-md-2 col-sm-4 col-xs-6">                    
                            <a href="mostrar_categoria/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
" class="thumbnail">
                            <img src="img/images.jpg" alt="imagen relacionada a la categoria">
                            </a>
                            <span id="categoria"><?php echo $_smarty_tpl->tpl_vars['cat']->value->nombre;?>
</span>                    
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
            </div>
         </div>
         <!--div class="col-md-2 col-sm-4 col-xs-3">
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
        
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
