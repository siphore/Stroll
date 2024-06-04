<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Run;
class Type extends Model
{
    use HasFactory;
    protected $fillable = ['type'];

    public function runs()
    {
        return $this->hasMany(Run::class);
    }
}
