<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'state', 'address_line', 'number', 'status'];

    public function device()
    {
        return $this->hasMany(Device::class);
    }
}
