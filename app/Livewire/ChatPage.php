<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatPage extends Component
{
    public $messages;
    public $user_id;
    public $receiver_id;
    public $receiver;
    public $showDropdown = null;
    public $chat_id;
    public $pinMessages;

    public function mount($receiver_id){
        $this->receiver_id = $receiver_id;
        $this->user_id = Auth::id();


    }

    public function pinMessage($id){
        $msg = Message::find($id);
        $msg->is_pinned = !$msg->is_pinned;
        $msg->save();
    }
    public function render()
    {
        $messages = Message::where('user_id' , $this->user_id)->where('receiver_id' , $this->receiver_id)->orWhere('user_id' , $this->receiver_id)->where('receiver_id' , $this->user_id)->get();
        $this->messages = $messages;
        $receiver = User::where('id' , $this->receiver_id)->first();
        $this->receiver = $receiver;
        $this->chat_id = $messages->first()->chat_id;
        $this->pinMessages = Message::where('chat_id' , $this->chat_id)->where('is_pinned', 1)->orderBy('id')->get();
        return view('livewire.chat-page')->layout('layouts.app');
    }
}
