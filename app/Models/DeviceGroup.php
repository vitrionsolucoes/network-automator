<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    public function device()
    {
        return $this->hasMany(Device::class);
    }
    
}
