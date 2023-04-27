<?php

namespace App\Http\Controllers;

use App\Models\DeviceVendor;
use Illuminate\Http\Request;

class DeviceVendorController extends Controller
{
    public function index()
    {
        $deviceVendors = DeviceVendor::all();
        return view('device.vendor.index', compact('deviceVendors'));
    }

    public function show()
    {
        
    }

    public function create()
    {
        return view('device.vendor.create');
    }

    public function store(Request $request)
    {
        DeviceVendor::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('device.vendor.index');
    }

    public function edit(DeviceVendor $device)
    {
        return view('device.vendor.edit');
    }

    public function update(Request $request, DeviceVendor $device)
    {

    }

    public function destroy(DeviceVendor $device)
    {
        $device->delete();
        return view('device.vendor.index')->with('success', 'Fabricante excluído com sucesso.');
    }
}
