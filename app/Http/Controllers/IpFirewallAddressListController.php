<?php

namespace App\Http\Controllers;

use App\Models\Routerboard;
use Illuminate\Http\Request;
use App\Models\IpFirewallAddressList;

class IpFirewallAddressListController extends Controller
{
    public function create($id)
    {
        $routerboard = Routerboard::findOrFail($id);
        return view('routerboard.ip.firewall.address-list.create', compact('routerboard'));
    }

    public function store(Request $request, $id)
{
        $ipFirewallAddressList = new IpFirewallAddressList();
        $ipFirewallAddressList->routerboard_id = $id;
        $ipFirewallAddressList->name = $request->input('name');
        $ipFirewallAddressList->address = $request->input('address');
        $ipFirewallAddressList->comment = $request->input('comment');
        $ipFirewallAddressList->timeout = $request->input('timeout');
        $ipFirewallAddressList->disabled = $request->input('disabled', 'no');
        $ipFirewallAddressList->save();

        return view('dashboard');
    }    
}   
