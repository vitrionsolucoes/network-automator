<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('location.index', compact('locations'));
    }

    public function show(Location $location)
    {
        return view('location.show', compact('location'));
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
        Location::create([
            'name' => $request->input('name'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'address_line' => $request->input('address_line'),
            'number' => $request->input('number'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('location.index');
    }

    public function edit(Location $location)
    {
        return view('location.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $location->update($request->all());
        return redirect()->route('location.index')->with('success', 'Localidade atualizada com sucesso.');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')->with('success', 'Localidade excluída com sucesso.');
    }
}
