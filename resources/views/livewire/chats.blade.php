<div>
    <!-- بخش جستجو -->
    <div class="container py-3">
        <div class="input-group mb-3">
            <span class="input-group-text bg-white">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" id="search_direct" class="form-control" name="searchDirect" placeholder="جستجوی دایرکت..." wire:model.live.debounce.1s="searchDirect">
        </div>
    </div>

    <!-- لیست چت‌ها -->
    <div class="container">
        <ul class="list-group" id="chatList">
            @foreach ($chatUsers as $user)
                @php

                    $latestReceiverMessage = $user->messages()->where('receiver_id', $userId)->latest()->first();
                    $latestSenderMessage = auth()
                        ->user()
                        ->messages()
                        ->where('receiver_id', $user->id)
                        ->latest()
                        ->first();
                @endphp

                <li class="list-group-item d-flex align-items-center chat-item"
                    onclick="window.location.href='{{ route('chat-page' , $user->id) }}'">
                    <img src="{{ asset($user->profile_photo_path ? $user->profile_photo_path : 'avatar.jpg') }}"
                        alt="Ali" class="chat-avatar me-3">
                    <div>

                        <h6 class="mb-0">{{ $user->name }}</h6>
                        <small class="text-muted">
                            @if ($latestReceiverMessage && $latestSenderMessage)
                                {{ $latestReceiverMessage->created_at > $latestSenderMessage->created_at ? Illuminate\Support\Str::limit($latestReceiverMessage->message, 10, '...') : Illuminate\Support\Str::limit($latestSenderMessage->message, 10, '...') }}
                            @elseIf($latestReceiverMessage && $latestSenderMessage == null)
                                {{ Illuminate\Support\Str::limit($latestReceiverMessage->message, 10, '...') }}
                            @elseIf($latestReceiverMessage == null && $latestSenderMessage)
                                {{ Illuminate\Support\Str::limit($latestSenderMessage->message, 10, '...') }}
                            @endif
                        </small>
                    </div>
                </li>
            @endforeach

        </ul>


    </div>
    <div class="container">
        <a class="btn btn-sm btn-info text-light" style="position:fixed;left:20px;bottom:20px;"
            href="{{ route('user.auth.logout') }}">خروج از حساب</a>
    </div>


</div>

@push('styles')
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: #f5f5f5;
            font-family: tahoma, sans-serif;
            direction: rtl;
            height: 100%;
            width: 100%;
        }

        .chat-item {
            cursor: pointer;
            transition: background 0.2s;
        }

        .chat-item:hover {
            background-color: #f1f1f1;
        }

        .chat-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
@endpush
