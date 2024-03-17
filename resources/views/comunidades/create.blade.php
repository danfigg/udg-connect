<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create comunidad</title>
</head>
<body>
    <h1>Crear comunidad</h1>

    <a href="{{ route('comunidades.index')}}">Back to index</a><br><br>

    <form action="{{ route('comunidades.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"><br>
        @error('nombre')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="20" rows="5"></textarea><br>
        @error('descripcion')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <div class="mt-4">
                <x-label for="centro" value="{{__('Centro')}}" />
                <select name="centro" id="centro">
                    <option value="0">Seleccione un centro</option>
                    @foreach ($centros as $centro)
                        <option value="{{$centro->id}}">{{$centro->nombre}}</option>
                    @endforeach
                </select>
        <div>

        <label for="reglas">Reglas</label>
        <textarea name="reglas" id="reglas" cols="20" rows="5"></textarea><br>
        @error('reglas')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="banner">Banner</label>
        <input type="file" name="banner" id="banner"><br>
        @error('banner')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <label for="estado_comunidad">Estado de la comunidad</label>
        <select name="estado_comunidad" id="estatus">
            <option value="activo">Activa</option>
            <option value="inactivo">Inactivo</option>
        </select><br>
        @error('estado_comunidad')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <button type="submit">Crear</button>
    </form>
    
</body>
</html>
