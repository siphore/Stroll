<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Run;


class Run_done extends Model
{
    use HasFactory;

    protected $table = 'runs_done';
    public $timestamps = false;
    public function run()
    {
        return $this->hasMany(Run::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}