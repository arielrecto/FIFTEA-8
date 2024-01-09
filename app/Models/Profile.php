<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'middle_name',
        'first_name',
        'age',
        'sex',
        'phone',
        'block',
        'lot',
        'street',
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
