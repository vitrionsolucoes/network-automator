<?php

namespace App\Models;

use App\Models\DeviceModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceVendor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function deviceModel()
    {
        return $this->hasMany(DeviceModel::class);
    }
}
