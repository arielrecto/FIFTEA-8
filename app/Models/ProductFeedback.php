<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeedback extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id',
        'feedback_id',
        'rate'
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function feedback(){
        return $this->belongsTo(Feedback::class);
    }

}
