<div>
        <!-- بخش جستجو -->
        <div class="container py-3">
            <div class="input-group mb-3">
                <span class="input-group-text bg-white">
                    🔍
                </span>
                <input type="text" class="form-control" id="searchInput" placeholder="جستجوی دایرکت...">
            </div>
        </div>

        <!-- لیست چت‌ها -->
        <div class="container">
            <ul class="list-group" id="chatList">
                <li class="list-group-item d-flex align-items-center chat-item"
                    onclick="window.location.href='chat.html?user=ali'">
                    <img src="https://i.pravatar.cc/100?img=1" alt="Ali" class="chat-avatar me-3">
                    <div>
                        <h6 class="mb-0">Ali</h6>
                        <small class="text-muted">سلام چطوری؟</small>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center chat-item"
                    onclick="window.location.href='chat.html?user=sara'">
                    <img src="https://i.pravatar.cc/100?img=2" alt="Sara" class="chat-avatar me-3">
                    <div>
                        <h6 class="mb-0">Sara</h6>
                        <small class="text-muted">فردا میای؟</small>
                    </div>
                </li>
                <li class="list-group-item d-flex align-items-center chat-item"
                    onclick="window.location.href='chat.html?user=hamed'">
                    <img src="https://i.pravatar.cc/100?img=3" alt="Hamed" class="chat-avatar me-3">
                    <div>
                        <h6 class="mb-0">Hamed</h6>
                        <small class="text-muted">باشه پس...</small>
                    </div>
                </li>
            </ul>


        </div>
        <div class="container">
               <a class="btn btn-sm btn-info text-light" style="position:fixed;left:20px;bottom:20px;"  href="{{ route('user.auth.logout') }}">خروج از حساب</a>
            </div>

        <script>
            // فیلتر کردن لیست چت‌ها با سرچ
            const searchInput = document.getElementById('searchInput');
            const chatList = document.getElementById('chatList');
            const chats = chatList.getElementsByTagName('li');

            searchInput.addEventListener('keyup', function() {
                const filter = searchInput.value.toLowerCase();
                for (let i = 0; i < chats.length; i++) {
                    const name = chats[i].getElementsByTagName('h6')[0].innerText.toLowerCase();
                    if (name.includes(filter)) {
                        chats[i].style.display = "";
                    } else {
                        chats[i].style.display = "none";
                    }
                }
            });
        </script>
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
