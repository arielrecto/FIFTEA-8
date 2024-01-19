<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\ConversationMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function conversation(){
        $user = Auth::user();
        $conversation = Conversation::with(['messages', 'participant'])->where('owner_id', $user->id)->first();

        $messages = ConversationMessage::where('conversation_id', $conversation->id)
        ->where('receiver_id', $user->id)->where('seen', false)->get();

        collect($messages)->map(function($message){
            $message->update([
                'seen' => true
            ]);
        });

        return response([
            'conversation' => $conversation
        ]);
    }
    public function create(){

        $admin = User::role('admin')->first();
        $user = Auth::user();

       $conversation = Conversation::create([
            'owner_id' => $user->id,
            'participant_id' => $admin->id
       ]);


       return response(['conversation' => $conversation], 200);
    }
    public function sendMessage(string $id, Request $request){
        $conversation = Conversation::find($id);

        $user = Auth::user();

        ConversationMessage::create([
            'content' => $request->message,
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'receiver_id' => $conversation->participant_id
        ]);

        return response([
            'message' => 'message sent',
        ], 200);
    }
}
