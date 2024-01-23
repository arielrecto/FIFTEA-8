<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'low',
        'high',
    ];
}
