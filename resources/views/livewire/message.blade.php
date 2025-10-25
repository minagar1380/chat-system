<div>
    <div class="form-message">
        <textarea id="messageInput" class="form-control" rows="1" placeholder="پیام خود را بنویسید..." wire:model="newMessage"></textarea>
        <button type="submit" wire:click="makeMessage()" class="btn btn-success">➤</button>
    </div>
    <script>
        const textarea = document.getElementById("messageInput");
        textarea.addEventListener("input", function() {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";

        });
    </script>
</div>

@push('styles')
    <style>
          .form-message {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .chat-footer .form-message textarea {
            resize: none;
            overflow-y: auto;
            border-radius: 20px;
            width: 50%;
            max-height: 120px;
        }
        .form-message .btn {
            border-radius: 50%;
            flex-shrink: 0;
        }

         .form-message textarea::-webkit-scrollbar {
            display: none;
        }

        .form-message textarea {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush
