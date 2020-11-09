<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Level;
use App\LevelUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Level::all();

        return view('admin.usuarios.create', compact('niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $usuario = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        $nivelUsuario = LevelUser::create([
            'level_id' => $request['level_id'],
            'user_id' => $usuario->id
        ]);

        $usuario->assignRole('Estudiante');

        return redirect('/usuarios')->with('mensaje', 'Usuario agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        $niveles = Level::all();

        $nivelUsuario = LevelUser::where('user_id', $usuario->id)->first();

        return view('admin.usuarios.edit', compact('usuario', 'niveles', 'nivelUsuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $usuario = User::find($id);
        $nivelUsuario = LevelUser::where('user_id', $usuario->id)->first();

        $datosUser = request()->except(['_method', '_token']);

        if(empty($request['password'])){
            $datosUser = request()->except(['password']);
        }else{
            $datosUser['password'] = Hash::make($request['password']);
        }

        $usuario->update($datosUser);
        $nivelUsuario->update([
            'level_id' => $datosUser['level_id']
        ]);

        return redirect('/usuarios')->with('mensaje', 'Usuario modificado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return redirect('/usuarios')->with('mensaje', 'Usuario borrado con exito');
    }
}
