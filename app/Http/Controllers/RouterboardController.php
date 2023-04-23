<?php

namespace App\Http\Controllers;

use App\Models\Routerboard;
use Illuminate\Http\Request;

class RouterboardController extends Controller
{
    public function index()
    {
        $routerboards = Routerboard::all();
        return view('routerboard.index', compact('routerboards'));
    }
    
    public function create()
    {
        return view('routerboard.create');
    }
    
    public function show($id)
    {
        $routerboard = Routerboard::find($id);
        return view('routerboard.show', compact('routerboard'));
    }

    public function store(Request $request)
    {
        Routerboard::create([
            'hostname' => $request->input('hostname'),
            'ipv4_mgmt_address' => $request->input('ipv4_mgmt_address'),
            'ipv6_mgmt_address' => $request->input('ipv6_mgmt_address'),
            'model' => $request->input('model'),
            'software_version' => $request->input('software_version'),
        ]);

        return redirect()->route('routerboard.index');
    }
}
