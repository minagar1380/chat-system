<?php

namespace App\Livewire;

use App\Models\Message as MessageModel;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Message extends Component
{
    #[Validate('required|string|max:3000')]
    public $newMessage = '';

    public $receiver;

    public function messages(){
        return [
            'newMessage.required' => 'پیام نمیتواند خالی باشد',
            'newMessage.string' => 'پیام باید از نوع متن باشد',
            'newMessage.max' => 'حداکثر طول پیام 3000 کارکتر است',
        ];
    }

    public function makeMessage()
    {
        $this->validate();
        $newMsg = MessageModel::create([
            'user_id' => Auth::id(),
            'message' => $this->newMessage,
            'chat_id' =>  min(Auth::id(), $this->receiver->id) . '-' . max(Auth::id(), $this->receiver->id),
            'receiver_id' =>$this->receiver->id,
        ]);

        $this->newMessage = '';
    }
    public function render()
    {
        return view('livewire.message');
    }
}
