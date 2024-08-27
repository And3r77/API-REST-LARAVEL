<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = User::orderBy('created_at', 'desc')->take(50)->get();

        return response()->json($news);
    }

    public function index2($id)
    {
        $news = User::orderBy('created_at', 'desc')->find($id);

        return response()->json($news);
    }

    public function index3(Request $request)
    {

        $news = User::orderBy('created_at', 'desc')->find($request->id);

        return response()->json($news);
    }

    // Método para actualizar una noticia específica
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            // Otros campos de validación según necesidad
        ]);

        $news = User::findOrFail($id);
        $news->update($validatedData);

        return response()->json([
            'message' => 'Noticia actualizada con éxito.',
            'data' => $news,
        ]);
    }
}
