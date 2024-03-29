<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:Ver usuarios')->only('index');
        // $this->middleware('can:Crear usuarios')->only('create', 'store');
        $this->middleware('can:Actualizar usuarios')->only('edit', 'update',);
        $this->middleware('can:Eliminar usuarios')->only('destroy');
    }
    public function index()
    {
        return view('admin.pages.user.index');
    }
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('admin.pages.user.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit', $usuario)->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return  redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente');
    }
}