<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = User::orderBy('created_at', 'desc')->get();

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

    // Método para actualizar un usuario específico
    public function update(Request $request)
    {
        //return 1;
        $user = User::findOrFail($request->id);
        $user->email=$request->email;
        $user->name=$request->name;
        $user->save();

        return response()->json([
            'message' => 'Usuario actualizado con éxito.',
            'data' => $user,
        ]);
    }

    public function destroy(Request $request)
    {
        $news = User::findOrFail($request->id); // Encuentra el registro por ID o lanza una excepción si no se encuentra

        $news->delete(); // Elimina el registro

        return response()->json([
            'message' => 'Usuario eliminado con éxito.'
        ]);
    }
}
