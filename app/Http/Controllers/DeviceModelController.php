<?php

namespace App\Http\Controllers;

use App\Models\DeviceModel;
use App\Models\DeviceVendor;
use Illuminate\Http\Request;

class DeviceModelController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        $deviceModels = DeviceModel::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', '%'.$query.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    
        return view('device.model.index', compact('deviceModels'));
    }

    public function show($id)
    {
        $deviceModel = DeviceModel::find($id);
        return view('device.model.show', compact('deviceModel'));
    }

    public function create()
    {
        $deviceVendors = DeviceVendor::all();
        return view('device.model.create', compact('deviceVendors'));
    }

    public function store(Request $request)
    {
        DeviceModel::create([
            'name' => $request->input('name'),
            'device_vendor_id' => $request->input('device_vendor_id')
        ]);

        return redirect()->route('device.model.index')->with('success', 'Modelo criado com sucesso.');
    }

    public function edit($id)
    {
        $deviceModel = DeviceModel::find($id);
        return view('device.model.edit', compact('deviceModel'));
    }

    public function update(Request $request, $id)
    {
        DeviceModel::find($id)->update($request->all());
        return redirect()->route('device.model.index')->with('success', 'Modelo atualizado com sucesso.');
    }

    public function destroy($id)
    {
        DeviceModel::find($id)->delete();
        return view('device.model.index')->with('success', 'Modelo excluído com sucesso.');
    }
}
