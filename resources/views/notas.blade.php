<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="col-6 m-5">
        <h1>Notas desde base de datos</h1>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            @foreach ($notas as $nota)
                <tr>
                    <td>{{ $nota->nombre }}</td>
                    <td>{{ $nota->descripcion }}</td>
                    <td><a href="{{ route('detalle', $nota) }}"><button><i class="bi bi-search"></i></button></a></td>
                    <td><a href="{{ route('notas.editar', $nota) }}"><button><i class="bi bi-pencil-square"></i></button></a></td>
                    <td>
                        <form action="{{ route('notas.eliminar', $nota) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $notas->links() }}

        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="mt-5">
            <h2>Crear nueva nota</h2>

            <form action="{{ route('notas.crear') }}" method="POST">
                @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
                @error('nombre')
                    <div class="alert alert-danger">Debes rellenar el nombre</div>
                @enderror
                @error('descripcion')
                    <div class="alert alert-danger">Debes rellenar la descripción</div>
                @enderror
                <input type="text" name="nombre" value="{{old('nombre')}}" placeholder="Nombre de la nota" class="form-control mb-2"
                    autofocus>
                <input type="text" name="descripcion" value="{{old('descripcion')}}" placeholder="Descripcion de la nota" class="form-control mb-2">
                <button class="btn btn-primary btn-block" type="submit">
                    Crear nueva nota
                </button>

            </form>
        </div>
    </div>
</body>

</html>
