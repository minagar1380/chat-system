<div>
    <div class="container-fluid chat-wrapper">

        <!-- هدر -->
        <div class="chat-header">
            <div class="user-info">
                <img src="https://i.pravatar.cc/100?img=2" alt="Sara">
                <h6>Sara</h6>
            </div>
            <div class="search-box">
                <input type="text" id="searchMessages" class="form-control form-control-sm"
                    placeholder="جستجو در پیام‌ها">
            </div>
        </div>

        <!-- بدنه چت -->
        <div class="chat-body" id="chatBody">
            <div class="message other">سلام علی، خوبی؟</div>
            <div class="message me">سلام سارا، مرسی. تو چطوری؟</div>
            <div class="message other">منم خوبم. برای فردا آماده‌ای؟</div>
            <div class="message me">آره حتما 👍</div>
            <div class="message other">باشه پس فردا می‌بینمت.</div>
            <div class="message me">منتظرم 🌹</div>
        </div>

        <!-- فوتر -->
        <div class="chat-footer">
            @livewire('message')
        </div>

    </div>

    <script>
        const searchInput = document.getElementById("searchMessages");
        const chatBody = document.getElementById("chatBody");
        searchInput.addEventListener("keyup", function() {
            const searchText = this.value.toLowerCase();
            const messages = chatBody.getElementsByClassName("message");

            for (let msg of messages) {
                const text = msg.innerText.toLowerCase();
                msg.innerHTML = msg.innerText; // ریست کردن هایلایت
                if (searchText && text.includes(searchText)) {
                    const regex = new RegExp(searchText, "gi");
                    msg.innerHTML = msg.innerText.replace(regex, match =>
                        `<span class="highlight">${match}</span>`);
                    msg.style.display = "";
                } else if (searchText && !text.includes(searchText)) {
                    msg.style.display = "none";
                } else {
                    msg.style.display = "";
                }
            }
        });

    </script>
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
