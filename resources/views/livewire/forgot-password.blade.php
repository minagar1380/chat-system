<div>
    <div class="container d-flex justify-content-center align-items-center vh-100 py-3" dir="rtl">
        <div class="card shadow-sm" style="width: 350px;">
            <div class="card-body">

                <h3 class="card-title text-center mb-4">بازیابی رمز عبور</h3>
                @if (session('message'))
                    <div class="text-green-500 text-sm">{{ session('message') }}</div>
                @endif

                <form wire:submit="sendResetLinkEmail">

                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="email" class="form-control" id="email" wire:model.blur="email"
                            placeholder="ایمیل خود را وارد کنید" name="email" value="{{ old('email') }}">
                        <div class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror

                        </div>
                    </div>


                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">ثبت</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
