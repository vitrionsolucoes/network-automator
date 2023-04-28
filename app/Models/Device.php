<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Location;
use App\Models\DeviceGroup;
use App\Models\DeviceModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hostname',
        'ipv4_address',
        'ipv6_address',
        'snmp_version',
        'snmp_community',
        'device_group_id',
        'device_model_id',
        'location_id',
        'status',
    ];

    public function deviceGroup()
    {
        return $this->belongsTo(DeviceGroup::class);
    }

    public function deviceModel()
    {
        return $this->belongsTo(DeviceModel::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
