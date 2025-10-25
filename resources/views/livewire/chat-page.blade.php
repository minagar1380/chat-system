<div>
    <div class="container-fluid chat-wrapper">

        <div class="chat-header">
            <div class="user-info">
                <img src="https://i.pravatar.cc/100?img=2" alt="Sara">
                <h6>{{ $receiver->name }}</h6>
            </div>
            <div class="search-box">
                <input type="text" id="searchMessages" class="form-control form-control-sm"
                    placeholder="جستجو در پیام‌ها">
            </div>
        </div>

        <div class="chat-body" id="chatBody" wire:poll.2s>

        @foreach($messages as $msg)
            <div class="message {{ $msg->user_id == $user_id ? 'me' : 'other' }}"> {{ $msg->message }} </div>
            @endforeach
        </div>

        <div class="chat-footer">
            @livewire('message' , ['receiver' => $receiver])
        </div>

    </div>


</div>

@push('styles')
    <style>
        body {
            background: #f0f2f5;
            direction: rtl;
            font-family: tahoma, sans-serif;
        }

        .chat-wrapper {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            background: #fff;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
        }

        .chat-header .user-info {
            display: flex;
            align-items: center;
        }

        .chat-header img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .chat-header h6 {
            margin: 0;
            font-weight: bold;
        }

        .chat-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
        }

        .message {
            max-width: 60%;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 20px;
            position: relative;
        }

        .message.me {
            margin-right: auto;
            background: #d1f7c4;
            border-bottom-right-radius: 0;
        }

        .message.other {
            margin-left: auto;
            background: #fff;
            border-bottom-left-radius: 0;
        }

        .chat-footer {
            background: #fff;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .highlight {
            background: yellow;
            font-weight: bold;
        }


    </style>
@endpush
