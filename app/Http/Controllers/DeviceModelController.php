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

    public function show()
    {

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

        return redirect()->route('device.vendor.index');
    }

    public function edit(DeviceModel $device)
    {
        return view('device.model.edit');
    }

    public function update(Request $request, DeviceModel $device)
    {

    }

    public function destroy(DeviceModel $deviceModel)
    {
        $deviceModel->delete();
        return view('device.model.index')->with('success', 'Modelo excluído com sucesso.');
    }
}
