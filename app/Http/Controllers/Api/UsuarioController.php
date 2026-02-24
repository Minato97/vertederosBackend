<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['registrar']]);
    }*/

    public function usuarios()
    {
        $data = User::with('roles','estatus')->get();
        return $data;
    }

    //Solo registra usuarios de modo normal, para administrador es manual en la BD
    public function registrar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $user = User::create(array_merge(
            $validator->validate(),
            ['password' => bcrypt($request->password),
                'apellido_materno' => $request->apellido_materno,
                'id_estatus' => 1,
                'id_roles' => 2
            ]
        ));

        return response()->json([
            'message' => '¡Usuario registrado exitosamente!',
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {

        $user = User::find($request->id);

        if ($request->foto == "null") {
            $user->nombres = $request->nombres;
            $user->apellido_paterno = $request->apellido_paterno;
            $user->apellido_materno = $request->apellido_materno;
            $user->email = $request->email;
            $user->id_estatus = $request->id_estatus;

            $user->save();
        } else {
            $foto = $request->file('foto');
            $nombres = $request->nombres;
            $apellidoPaterno = $request->apellido_paterno;
            $extension = $foto->getClientOriginalExtension(); // Obtener la extensión original del archivo
            $nombreArchivo = "{$nombres}_{$apellidoPaterno}.{$extension}";
            // Almacenar la imagen con el nombre personalizado en la carpeta "public/fotos_estudiantes"
            $foto->storeAs('public/fotos_users', $nombreArchivo);

            // Obtener la URL del archivo almacenado
            $url = Storage::url("public/fotos_users/{$nombreArchivo}");
            $user->nombres = $request->nombres;
            $user->apellido_paterno = $request->apellido_paterno;
            $user->apellido_materno = $request->apellido_materno;
            $user->email = $request->email;
            $user->foto = $url;
            $user->id_estatus = $request->id_estatus;
            $user->save();
        }


        return $user;
    }
}
