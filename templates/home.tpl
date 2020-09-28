<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Tres Arroyos</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

    {include 'header.tpl'}
    <main class="container"> <!-- inicio del contenido principal -->
        
        {include 'carrusel.tpl'}
        
        <h1>NUESTRAS HABITACIONES</h1>
        <p>En nuestro hotel todas las habitaciones cuentan con Caja Fuerte, Placard, Ropa Blanca, calefacción por Losa Radiante, TV por cable y Aire acondicionado (Excepto las estándar).</p>

        <span>CONOCELAS…</span>
        

        <ul class="list-group mt-5">
        {foreach from=$categorias item=cat}
            <li class="list-group-item">
                <a href="mostrar_categoria/{$cat->id}">{$cat->nombre}</a>
            </li>
        {/foreach}
        </ul> 
        
    </main>
    {include file='footer.tpl'}
</body>
</html> 