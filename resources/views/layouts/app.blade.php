<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Clientes</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">     <!-- Link responsavel pela estilização da aplicação -->
</head>
<body>

<!--O layout app.blade.php é projetado para ser estendido por outras views -->
<!--fornece a estrutura básica de uma página HTML -->
    
<div class="container"> 
        @yield('content')
    </div>

</body>
</html>
