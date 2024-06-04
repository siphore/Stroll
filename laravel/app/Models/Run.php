<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Run extends Model
{
    protected $table = 'runs';
    use HasFactory;

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
