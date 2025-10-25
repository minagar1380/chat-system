<div>
    <div class="container d-flex justify-content-center align-items-center vh-100 py-3" dir="rtl">
        <div class="card shadow-sm" style="width: 350px;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">فرم بازیابی</h3>
                @error('token')

                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <form wire:submit="resetPassword">
                    <!-- token input -->
                    <input type="hidden" name="token" value="{{ $token }}">
                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="email" class="form-control" value="{{ $email }}" id="email" readonly>
                        <input type="hidden" class="form-control" id="hidden-email" name="email" wire:model="email">

                    </div>

                    <!-- Password input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">رمز عبور</label>
                        <input type="password" class="form-control" id="password"
                            placeholder="رمز عبور خود را وارد کنید" wire:model="password" name="password">
                        <div class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!-- Confirm Password input -->
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">رمز عبور مجدد</label>
                        <input type="password" class="form-control" id="confirmPassword"
                            wire:model="password_confirmation" name="password_confirmation"
                            placeholder="رمز عبور خود را مجددا وارد کنید">
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
