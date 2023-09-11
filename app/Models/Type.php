<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function supplies(){
        return $this->belongsToMany(Supply::class)->withPivot(['price']);
    }
}
