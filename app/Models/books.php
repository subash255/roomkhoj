<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
