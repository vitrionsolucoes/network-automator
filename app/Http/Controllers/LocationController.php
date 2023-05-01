<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        $filter = $request->get('filter');
    
        $locations = Location::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', '%'.$query.'%')
                    ->orWhere('address_line', 'LIKE', '%'.$query.'%');
            })
            ->when($filter && $filter != 'all', function ($queryBuilder) use ($filter) {
                if ($filter == 'active') {
                    $queryBuilder->where('status', 'active');
                } elseif ($filter == 'inactive') {
                    $queryBuilder->where('status', 'inactive');
                } 
            })
            ->orderBy('name', 'asc')
            ->paginate(5);
    
        return view('location.index', compact('locations'));
    }

    public function show($id)
    {
        $location = Location::find($id);
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

    public function edit($id)
    {
        $location = Location::find($id);
        return view('location.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        Location::find($id)->update($request->all());
        return redirect()->route('location.index')->with('success', 'Localidade atualizada com sucesso.');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()
            ->route('location.index')
            ->with('success', 'Localidade excluída com sucesso.');
    }
    
}
