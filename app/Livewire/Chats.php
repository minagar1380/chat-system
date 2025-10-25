<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Chats extends Component
{
    public $searchDirect = '';
    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();

    }

    public function render()
    {
        $allMessages = Message::select('user_id', 'receiver_id')
            ->where('user_id', $this->userId)
            ->orWhere('receiver_id', $this->userId)
            ->get();

        $chatUserIds = $allMessages
            ->pluck('user_id')
            ->merge($allMessages->pluck('receiver_id'))
            ->reject(fn($id) => $id == $this->userId)
            ->unique()
            ->values();

        $query = User::whereIn('id', $chatUserIds);

        if (!empty($this->searchDirect)) {
            $query->where('name', 'LIKE', '%' . $this->searchDirect . '%');
        }
        // dd($this->searchDirect);

        return view('livewire.chats', [
            'chatUsers' => $query->get(),
        ])->layout('layouts.app');
    }
}
