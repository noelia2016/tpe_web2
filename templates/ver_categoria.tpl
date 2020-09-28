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
        
        
        {foreach from=$categoria item=cat}
            <h1>{$cat->nombre}</h1>
            <p>{$cat->descripcion}</p>
        {/foreach}

        <h3>Habitaciones con dicha categoria</h3>
        <ul class="list-group mt-5">
        {foreach from=$habitaciones item=hab}
            <li class="list-group-item">
                <a href="mostrar_habitacion/{$hab->id}">Habitacion N {$hab->nro} - {$hab->ubicacion}</a>
            </li>
        {/foreach}
        </ul> 
        
    </main>
    {include file='footer.tpl'}
</body>
</html> 