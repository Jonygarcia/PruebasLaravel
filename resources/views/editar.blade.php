<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</head>

<body>
    <h2>Editando la nota {{ $nota->id }}</h2>

    @if (session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}
        </div>
    @endif
    <form action="{{ route('notas.actualizar', $nota->id) }}" method="POST">
        @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
        @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
        @error('nombre')
            <div class="alert alert-danger"> El nombre es obligatorio </div>
        @enderror
        @error('descripcion')
            <div class="alert alert-danger"> La descripción es obligatoria </div>
        @enderror
        <input type="text" name="nombre" class="form-control mb-2" value="{{ $nota->nombre }}"
            placeholder="Nombre de la nota" autofocus>
        <input type="text" name="descripcion" placeholder="Descripción de la nota" class="form-control mb-2"
            value="{{ $nota->descripcion }}">
        <button class="btn btn-primary btn-block" type="submit">Guardar cambios</button>
    </form>
</body>

</html>
