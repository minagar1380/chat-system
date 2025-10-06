<div>
    <div x-data="{ open:false}">
        <div class="container d-flex justify-content-center align-items-center mt-3">
            <button @click="open = false" class="btn btn-info text-white">ورود</button>
            <button @click="open = true" class="btn btn-success">ثبتنام</button>
        </div>

        <div class="container d-flex justify-content-center align-items-center vh-100" dir="rtl">
            <div class="card shadow-sm" style="width: 350px;">
                <div  x-show="! open" class="card-body">
                    <h3 class="card-title text-center mb-4">فرم ورود</h3>
                    <form wire:submit="Login">
                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">ایمیل</label>
                            <input type="email" class="form-control" id="email" wire:model.blur="Lform.email" placeholder="ایمیل خود را وارد کنید" name="Lform.email"
                                >
                                <div class="text-danger">@error('Lform.email') {{ $message }} @enderror</div>

                        </div>

                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">رمز عبور</label>
                            <input type="password" class="form-control" id="password" wire:model.blur="Lform.password" placeholder="رمز عبور را وارد کنید" name="Lform.password"
                                >
                                <div class="text-danger">@error('Lform.password') {{ $message }} @enderror</div>
                        </div>

                        <!-- Remember me checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" wire:model="remember">
                            <label class="form-check-label" for="remember">ذخیره اطلاعات!</label>
                        </div>

                        <!-- Submit button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>

                        <!-- Forgot password link -->
                        <p class="text-center mt-3">
                            <a href="#">رمز عبور خود را فراموش کرده ام!</a>
                        </p>
                    </form>
                </div>


                <div x-show="open" class="card-body">
                    <h3 class="card-title text-center mb-4">فرم ثبتنام</h3>
                    <form wire:submit="Register">
                        <!-- Name input -->
                        <div class="mb-3">
                            <label for="name" class="form-label">نام و نام خانوادگی</label>
                            <input type="text" class="form-control" id="name" placeholder="نام و نام خانوادگی خود را وارد کنید" wire:model.blur="Rform.name" name="Rform.name"
                                >
                                <div class="text-danger">@error('Rform.name') {{ $message }} @enderror</div>
                        </div>

                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">ایمیل</label>
                            <input type="email" class="form-control" id="email" wire:model.blur="Rform.email" placeholder="ایمیل خود را وارد کنید" name="Rform.email"
                               >
                            <div class="text-danger">@error('Rform.email') {{ $message }} @enderror</div>
                        </div>

                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">رمز عبور</label>
                            <input type="password" class="form-control" id="password" placeholder="رمز عبور خود را وارد کنید" wire:model.blur="Rform.password" name="password"
                                >
                                <div class="text-danger">@error('Rform.password') {{ $message }} @enderror</div>
                        </div>

                        <!-- Confirm Password input -->
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">رمز عبور مجدد</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="رمز عبور خود را مجددا وارد کنید" required>
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
</div>
