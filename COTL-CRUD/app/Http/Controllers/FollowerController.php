<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;


class FollowerController extends Controller
{
    public function index(Request $request)
    {
        // Solo mostramos los seguidores del líder logueado
        $followers = $request->user()->followers;
        return view('followers.index', compact('followers'));
    }

    public function create()
    {
        return view('followers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string',
            'level' => 'required|integer|min:1',
            'loyalty_points' => 'required|integer|min:0|max:100',
            'is_elderly' => 'boolean',
            'joined_at' => 'required|date',
        ]);
        try {
            // Forzar el booleano si no viene en el request (checkbox)
            $validated['is_elderly'] = $request->has('is_elderly');

            $request->user()->followers()->create($validated);

            return redirect()->route('followers.index')->with('success', '¡Adepto reclutado!');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'No se pudo crear el adepto.']);
        }
    }
    public function edit(Request $request, Follower $follower)
    {
        // Verificación de seguridad
        if ($follower->user_id !== $request->user()->id) {
            abort(403, 'No puedes editar seguidores de otro culto.');
        }

        return view('followers.edit', compact('follower'));
    }

    public function update(Request $request, Follower $follower)
    {
        // Seguridad
        if ($follower->user_id !== $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string',
            'level' => 'required|integer|min:1',
            'loyalty_points' => 'required|integer|min:0|max:100',
            'joined_at' => 'required|date',
        ]);

        // Manejo del checkbox
        $validated['is_elderly'] = $request->has('is_elderly');

        $follower->update($validated);

        return redirect()->route('followers.index')->with('success', '¡Estadísticas del adepto actualizadas!');
    }

    public function destroy(Request $request, Follower $follower)
    {
        // Comparamos con el ID del usuario que viene en la petición
        if ($follower->user_id !== $request->user()->id) {
            abort(403);
        }

        $follower->delete();
        return redirect()->route('followers.index');
    }
}
