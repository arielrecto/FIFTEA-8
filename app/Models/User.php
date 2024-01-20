<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders () {
        return $this->hasMany(Order::class);
    }
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function cart(){
        return $this->hasOne(Cart::class);
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
    public function conversationOwner(){
        return $this->hasMany(Conversation::class, 'owner_id');
    }
    public function conversationParticipant(){
        return $this->hasMany(Conversation::class, 'participant_id');
    }
    public function sentMessage()
    {
        return $this->hasMany(ConversationMessage::class, 'sender_id');
    }
    public function receiveMessage()
    {
        return $this->hasMany(ConversationMessage::class, 'receiver_id');
    }
}
