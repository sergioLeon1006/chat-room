<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    use HasFactory;

    public function room() {
        return $this->hasOne('App\ModelsChatRoom', 'id', 'chat_room_id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
