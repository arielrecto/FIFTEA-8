<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\ConversationMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class conversationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $conversations = Conversation::with(['messages' => function($messages){
            $messages->latest()->first();
        }])->where('participant_id', $user->id)->latest()->get();

        return view('message.index', compact(['conversations']));
    }

    public function show(string $id)
    {

        $conversation = Conversation::find($id);

        return view('message.show', compact(['conversation']));
    }
    public function getConversationJson(string $id){
        $user = Auth::user();

        $conversation = Conversation::where('id', $id)->with([
            'messages',
            'owner'
        ])->first();


        $messages = ConversationMessage::where('conversation_id', $conversation->id)
        ->where('receiver_id', $user->id)->where('seen', false)->get();

        collect($messages)->map(function($message){
            $message->update([
                'seen' => true
            ]);
        });

        return response([
            'conversation' => $conversation
        ], 200);
    }
    public function sendMessage(string $id, Request $request){
        $conversation = Conversation::find($id);

        $user = Auth::user();

        ConversationMessage::create([
            'content' => $request->message,
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'receiver_id' => $conversation->owner_id
        ]);

        return response([
            'message' => 'message sent',
        ], 200);
    }
}
