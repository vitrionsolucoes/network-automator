<?php

namespace App\Models;

use App\Http\Controllers\IpFirewallAddressListController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routerboard extends Model
{
    use HasFactory;

    protected $fillable = ['hostname', 'ipv4_mgmt_address', 'ipv6_mgmt_address', 'model', 'software_version'];
    
    public function IpFirewallAddressList()
    {
        return $this->hasOne(IpFirewallAddressListController::class);
    }
}
