<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::paginate(8);
        return view('admin.pages.price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:prices,name', 'value' => 'required|numeric']);
        $price = Price::create($request->all());
        return redirect()->route('admin.prices.edit', $price)->with('success', 'Precio registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('admin.pages.price.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $request->validate(['name' => 'required|unique:prices,name,' . $price->id,
            'value' => 'required|numeric']);
        $price->update($request->all());
        return redirect()->route('admin.prices.edit', $price)->with('success', 'Precio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->route('admin.prices.index')->with('success', 'Precio eliminado correctamente');
    }
}