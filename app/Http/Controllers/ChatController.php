<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessages;
Use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function rooms (Request $request){
        return ChatRoom::all();
    }

    public function messages (Request $request, $roomId){
        return chatMessages::where('chat_room_id',$roomId)
        ->with('user')
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    public function newMessage(Request $request, $roomId){
        $newMessage = new ChatMessages();
        $newMessage->user_id = Auth::user();
        $newMessage->chat_room_id = $roomId;
        $newMessage->message = $request->messages;
        $newMessage->save();
        return $newMessage;
    }
}
