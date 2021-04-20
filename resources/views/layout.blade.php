<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        {{-- <script src="https://kit.fontawesome.com/838bb903c6.js" crossorigin="anonymous"></script> --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <title>Controle de Séries</title>
    </head>
    <body>  
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div class="pag">
            <div class="container">
                <div class="jumbotron">
                    <h1>@yield('cabecalho')</h1>
                </div>
                @yield('conteudo')
            </div>
        </div>
    </body>
</html>