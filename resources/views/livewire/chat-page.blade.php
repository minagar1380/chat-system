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

        @if(!$pinMessages->isEmpty())
        <div class="pin-box">
            <i class="bi bi-pin px-1 text-primary" style="font-size:10px;"></i>
            @foreach($pinMessages as $pinMessage)
            <p style="font-size:10px;">{{ $pinMessage->message }}</p>
            @endforeach



        </div>
@endif
        <div wire:poll.2s>
            <div class="chat-body" id="chatBody" x-data = "{dropDown: null }">

                @foreach ($messages as $msg)
                    <div class="message-box relative">
                        <div class="message {{ $msg->user_id == $user_id ? 'me' : 'other' }} col-md-6"
                            x-on:click="dropDown = (dropDown === {{ $msg->id }}) ? null : {{ $msg->id }}">
                            {{ $msg->message }} </div>
                        <div class="col-md-6 drop-down-box-{{ $msg->user_id == $user_id ? 'me' : 'other' }}">
                            <ul x-cloak x-show="dropDown === {{ $msg->id }}" x-on:click.outside="dropDown = null"
                                class="drop-down top-0 shadow-md rounded-md mt-1 p-2" x-transition
                                style="white-space: nowrap;">
                                <li><a wire:click="pinMessage({{ $msg->id }})"
                                        class="w-full text-left px-2 py-1 my-1 hover:bg-gray-100 btn btn-secondary none-decoration">Pin</a>
                                </li>
                                @if ($msg->user_id === $user_id)
                                    <li><a
                                            class="w-full text-left px-2 py-1 my-1 hover:bg-gray-100 btn btn-secondary none-decoration">Edit</a>
                                    </li>
                                @endif
                                <li><a
                                        class="w-full text-left px-2 py-1 my-1 hover:bg-gray-100 btn btn-secondary none-decoration">Reply</a>
                                </li>
                                <li><a
                                        class="w-full text-left px-2 py-1 my-1 hover:bg-gray-100 text-red-600 btn btn-secondary none-decoration">Delete</a>
                                </li>
                                <li><a
                                        class="w-full text-left px-2 py-1 my-1 hover:bg-gray-100 btn btn-secondary none-decoration">Forward</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="chat-footer">
            @livewire('message', ['receiver' => $receiver])
        </div>

    </div>


</div>

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            background: rgb(230, 235, 240);
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
            overflow-y: visible;
            margin-bottom: 40px;
        }

        .message-box {
            position: relative;

        }

        .message {
            max-width: 60%;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 20px;
            position: relative;
            cursor: pointer;
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
            position: fixed;
            bottom: 0;
            width: 100%;

        }

        .highlight {
            background: yellow;
            font-weight: bold;
        }

        .drop-down {
            background: rgba(255, 255, 255, 0.5);
            width: 100px;
            overflow-y: auto;
            position: absolute;
            border-radius: 5px;
            z-index: 100;

            /*
                top: 50%;
                transform: translateY(-50%);
                */
        }

        .drop-down-box-me {
            display: flex;
            justify-content: end;
            margin-left: auto;
        }

        .drop-down-box-other {
            display: flex;
            justify-content: start;
            margin-right: auto;

        }

        .drop-down li {
            display: flex;
            justify-content: left;
        }

        .pin-box{
            display:flex;
            background: rgba(255, 252, 252, 0.5);
            border:1px solid #ddd;
            justify-content:flex-start;
            align-items: flex-start;
            padding-right:10px;
            padding-top:10px;
            height:auto;
            border-radius: 5px;
        }
    </style>
@endpush
