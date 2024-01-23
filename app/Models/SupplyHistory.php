<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyHistory extends Model
{
    use HasFactory;


    protected $fillable = [
        'adjusted_by',
        'adjustment_quantity',
        'quantity',
        'expiration_date',
        'supply_id'
    ];


    public function supply(){
        return $this->belongsTo(Supply::class);
    }
}
