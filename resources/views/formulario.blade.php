<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @if($mostrarFormularioInteractivo)
        @livewire('formulario-interactivo')
    @endif

    @if($mostrarFormularioFinanciera)
        @livewire('formulariofinanciera')
    @endif

    @livewireScripts
</body>
</html>



