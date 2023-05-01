<?php

namespace App\Http\Controllers;

use App\Models\DeviceGroup;
use Illuminate\Http\Request;

class DeviceGroupController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        $deviceGroups = DeviceGroup::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', '%'.$query.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    
        return view('device.group.index', compact('deviceGroups'));
    }

    public function show($id)
    {
        $deviceGroup = DeviceGroup::find($id);
        return view('device.group.show', compact('deviceGroup'));
    }

    public function create()
    {
        return view('device.group.create');
    }

    public function store(Request $request)
    {
        DeviceGroup::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('device.group.index');
    }

    public function edit()
    {
        return view('device.group.edit');
    }

    public function update(Request $request, $id)
    {
        DeviceGroup::find($id)->update($request->all());
        return redirect()->route('device.group.index')->with('success', 'Grupo atualizado com sucesso.');
    }

    public function destroy($id)
    {
        DeviceGroup::find($id)->delete();
        return redirect()->route('device.group.index')->with('success', 'Grupo excluído com sucesso.');
    }
}
