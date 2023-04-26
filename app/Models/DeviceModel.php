<?php

namespace App\Models;

use App\Models\DeviceVendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceModel extends Model
{
    use HasFactory;

    public function deviceVendor()
    {
        return $this->belongsTo(DeviceVendor::class);
    }
}
