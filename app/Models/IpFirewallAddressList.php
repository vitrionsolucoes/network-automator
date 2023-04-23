<?php

namespace App\Models;

use App\Models\Routerboard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IpFirewallAddressList extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'comment', 'disabled', 'timeout'];

    public function routerboard()
    {
        return $this->belongsTo(Routerboard::class);
    }
}
