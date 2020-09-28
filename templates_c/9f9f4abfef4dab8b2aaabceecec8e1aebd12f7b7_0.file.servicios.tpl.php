<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 00:37:51
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\servicios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f71143f886c15_56939112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f9f4abfef4dab8b2aaabceecec8e1aebd12f7b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\servicios.tpl',
      1 => 1601246266,
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
function content_5f71143f886c15_56939112 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Tres Arroyos</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

    <?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main class="container"> <!-- inicio del contenido principal -->
        
        <?php $_smarty_tpl->_subTemplateRender('file:carrusel.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <h1>Servicios</h1>
        <p>Descubra un lugar único rodeado de naturaleza. Disfrútelo en armonía para vivir momentos únicos.</p>
        <p>Caminar, despejarse, relajarse y sentir que está en un verdadero paraíso.</p>
        <p>Le ofrecemos todos los servicios y nuestra cálida y profesional atención para que su estadía sea inolvidable y desee regresar pronto.</p>
        <p>Todo pensado para que disfrute su estadía al máximo y desee volver pronto. Restó, cafetería, gimnasio, spa, sauna, piscina climatizada, sala de rélax, masajes y nuestra atención cálida y profesional. </p>
        
        <h3><u>TARIFAS, PROMOS y RESERVAS</u></h3>
        <p>Las tarifas incluyen:</p>
        <ul>
            <li>Noches de alojamiento (precio por hab. no por persona).</li>
            <li>Uso del Spa (Ver horarios).</li>
            <li>Desayuno  abundante y variado: Té, Agua Caliente, Café, Leche, Yoghurts, Jugo Exprimido, Agua Mineral, Jamón y Queso, Cereales, Mermeladas varias, Manteca, Queso untable, Medias Lunas, Pan Lactal - blanco y de salvado-, Tostadas, Frutas Varias.</li>
            <li>Beneficios exclusivos para huéspedes en los menúes de la carta del restó ( no incluye bebida).</li>
            <li>Sesión en camilla de jade de regalo para cada adulto.</li>
        </ul>

        <p>Los precios de las habitaciones <span>rigen por noche.</span></p>
        <p><b><u>Check In:</u></b> 14:00 hs. Check Out 10:00 hs.</p>
        <p>Las reservas se realizan telefónicamente o vía e-mail provisoriamente por 24 hs. hasta recibir el depósito o transferencia.</p>
        <p><b><u>Financiación con tarjetas de crédito:</u></b> Tarjetas de Credito Visa, Mastercard, American Express y Nativa.</p>
 
     </main>
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html> <?php }
}
