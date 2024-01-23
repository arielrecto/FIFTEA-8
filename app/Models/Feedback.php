<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'is_display',
        'rate'
    ];



    public function user(){

        return $this->belongsTo(User::class);
    }
    public function productFeedback(){
        return $this->hasOne(ProductFeedback::class);
    }
}
