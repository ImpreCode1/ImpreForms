<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Formulario</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="px-4 sm:px-20 lg:px-20">
    @livewire('editar-formulario', ['formulario' => $formularioId])
    {{-- @livewire('editar-formulario') --}}
    @livewireScripts
    </div>
</body>
</html>