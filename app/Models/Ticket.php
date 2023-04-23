<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'requester_id', 'attendant_id', 'priority', 'status', 'time_spent', 'time_estimate', 'close_date_estimate', 'ended_at'];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function attendant()
    {
        return $this->belongsTo(User::class, 'attendant_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
