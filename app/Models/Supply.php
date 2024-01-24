<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'unit_value',
        'unit',
        'quantity',
        'product_fields_id',
        'size',
        'expiration_date',
        'low',
        'high'
    ];

    public function field()
    {
        return $this->belongsTo(ProductField::class);
    }
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
    public function types()
    {
        return $this->belongsToMany(Type::class)->withPivot(['price']);
    }
    public function history()
    {
        return $this->hasMany(SupplyHistory::class);
    }
}
