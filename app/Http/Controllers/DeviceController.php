<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Location;
use App\Models\DeviceGroup;
use App\Models\DeviceModel;
use Illuminate\Http\Request;
use FreeDSx\Snmp\SnmpClient;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        {
            $query = $request->get('search');
            $filter = $request->get('filter');

            $devices = Device::when($query, function ($queryBuilder) use ($query) {
                    $queryBuilder->where('name', 'LIKE', '%'.$query.'%')
                        ->orWhere('hostname', 'LIKE', '%'.$query.'%')
                        ->orWhere('ipv4_address', 'LIKE', '%'.$query.'%')
                        ->orWhere('ipv6_address', 'LIKE', '%'.$query.'%');
                })
                ->when($filter && $filter != 'all', function ($queryBuilder) use ($filter) {
                    if ($filter == 'active') {
                        $queryBuilder->where('status', 'active');
                    } elseif ($filter == 'inactive') {
                        $queryBuilder->where('status', 'inactive');
                    }
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        
            return view('device.index', compact('devices'));
        }
    }

    public function show($id)
    {
        $device = Device::find($id);
        /* $snmp = new SnmpClient([
            'host' => $device->ipv4_address,
            'version' => $device->snmp_version,
            'community' => $device->snmp_community,
        ]);
        
        $response = $snmp->getValue('1.3.6.1.2.1.1.5.0').PHP_EOL; */
        
        return view('device.show', compact('device'));
    }

    public function create()
    {
        $deviceGroups = DeviceGroup::all();
        $deviceModels = DeviceModel::all();
        $locations = Location::all();
        return view('device.create', compact('deviceGroups', 'deviceModels', 'locations'));
    }

    public function store(Request $request)
    {
        Device::create([
            'name' => $request->input('name'),
            'hostname' => $request->input('hostname'),
            'ipv4_address' => $request->input('ipv4_address'),
            'ipv6_address' => $request->input('ipv6_address'),
            'snmp_version' => $request->input('snmp_version'),
            'snmp_community' => $request->input('snmp_community'),
            'status' => $request->input('status'),
            'device_group_id' => $request->input('device_group_id'),
            'device_model_id' => $request->input('device_model_id'),
            'location_id' => $request->input('location_id'),
        ]);
        return redirect()->route('device.index')->with('success', 'Equipamento criado com sucesso.');
    }

    public function edit(Device $device)
    {
        return view('device.edit');
    }

    public function update(Request $request, Device $device)
    {

    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()
            ->route('device.index')
            ->with('success', 'Equipamento excluído com sucesso.');
    }
    
}