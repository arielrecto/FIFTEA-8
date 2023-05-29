<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'middle_name',
        'first_name',
        'age',
        'gender',
        'phone',
        'block',
        'lot',
        'hone_no',
        'municipality',
        'barangay',
        'subdivision',
        'region',
        'zip_code',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
