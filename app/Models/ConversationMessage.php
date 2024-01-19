<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationMessage extends Model
{
    use HasFactory;


    protected $fillable = [
        'content',
        'conversation_id',
        'sender_id',
        'receiver_id',
        'seen'
    ];


    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }
    public function sender(){
        return $this->belongsTo(User::class);
    }
    public function receiver(){
        return $this->belongsTo(User::class);
    }

}
