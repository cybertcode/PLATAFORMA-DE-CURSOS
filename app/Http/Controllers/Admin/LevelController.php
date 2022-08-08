<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::paginate(8);
        return view('admin.pages.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:levels,name',
        ]);
        $level = Level::create($request->all());

        return redirect()->route('admin.levels.edit', $level)->with('success', 'Nivel registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('admin.pages.level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|unique:levels,name,' . $level->id,
        ]);
        $level->update($request->all());
        return redirect()->route('admin.levels.edit', $level)->with('success', 'Nivel actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('admin.levels.index')->with('success', 'Nivel eliminado correctamente');

    }
}