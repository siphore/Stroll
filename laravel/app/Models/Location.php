<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Run;

class Location extends Model
{
    use HasFactory;
    public function runs()
    {
        return $this->belongsToMany(Run::class);
    }
}
