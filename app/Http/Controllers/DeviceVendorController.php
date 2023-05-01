<?php

namespace App\Http\Controllers;

use App\Models\DeviceVendor;
use Illuminate\Http\Request;

class DeviceVendorController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        $deviceVendors = DeviceVendor::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', '%'.$query.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    
        return view('device.vendor.index', compact('deviceVendors'));
    }

    public function show($id)
    {
        $deviceVendor = DeviceVendor::find($id);
        return view('device.vendor.show', compact('deviceVendor'));
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

    public function edit($id)
    {
        $deviceVendor = DeviceVendor::find($id);
        return view('device.vendor.edit', compact('deviceVendor'));
    }

    public function update(Request $request, $id)
    {
        DeviceVendor::find($id)->update($request->all());
        return redirect()->route('device.vendor.index')->with('success', 'Fabricante atualizado com sucesso.');
    }

    public function destroy($id)
    {
        DeviceVendor::find($id)->delete();
        return redirect()
        ->route('device.vendor.index')
        ->with('success', 'Fabricante excluído com sucesso.');
    }
}
