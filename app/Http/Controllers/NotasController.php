<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotasController extends Controller
{
    public function notas()
    {
        // $notas = Nota::all();
        $notas = Nota::paginate(3);

        return view('notas', @compact('notas'));
    }

    public function detalle($id)
    {
        $nota = Nota::findOrFail($id);
        return view('detalle', @compact('nota'));
    }

    public function crear(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2',
            'descripcion' => 'required|min:4'
        ]);

        $notaNueva = new Nota;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        $notaNueva->save();

        return back()->with('mensaje', 'Nota agregada exitosamente');
    }

    public function editar($id)
    {
        $nota = Nota::findOrFail($id);
        return view('editar', @compact('nota'));
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|min:2',
            'descripcion' => 'required|min:4'
        ]);

        $notaActualizar = Nota::findOrFail($id);
        $notaActualizar->nombre = $request->nombre;
        $notaActualizar->descripcion = $request->descripcion;
        $notaActualizar->save();

        return back()->with('mensaje', 'Nota actualizada');
    }

    public function eliminar($id) {
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();

        return back()->with('mensaje', 'Nota Eliminada');
    }


}
