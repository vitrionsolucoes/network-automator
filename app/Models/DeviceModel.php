<?php

namespace App\Models;

use App\Models\Device;
use App\Models\DeviceVendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'device_vendor_id'];
    
    public function deviceVendor()
    {
        return $this->belongsTo(DeviceVendor::class);
    }

    public function device()
    {
        return $this->hasMany(Device::class);
    }
}
