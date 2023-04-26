<?php

namespace App\Http\Controllers;

use App\Models\DeviceGroup;
use Illuminate\Http\Request;

class DeviceGroupController extends Controller
{
    public function index(Request $request)
    {
        $deviceGroups = DeviceGroup::all();
        return view('device.group.index', compact('deviceGroups'));
    }

    public function show()
    {

    }

    public function create(Request $request)
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

    public function edit(DeviceGroup $device)
    {

    }

    public function update(Request $request, DeviceGroup $device)
    {

    }

    public function destroy(Request $request, DeviceGroup $deviceGroup)
    {
        dd($request);
        $deviceGroup->delete();
        return redirect()->route('device.group.index')->with('success', 'Localidade excluída com sucesso.');
    }
}
