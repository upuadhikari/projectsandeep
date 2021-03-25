@include('header')


    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.png" alt="sing up image"></figure>
                    <a href="{{ url('register') }}" class="signup-image-link">Don't have an account? Register here.</a>
                </div>

                <div class="signin-form">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />

                    <h2 class="form-title">Log In</h2>
                    <!-- <form method="POST" class="register-form" id="login-form"> -->
                    <form method="POST"  class="register-form" id="login-form" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">
                        <x-label for="email" />
                        <x-input id="email" type="email" name="email" id="your_name" :value="old('email')" placeholder="Email" required autofocus />
                            <!-- <input type="text" name="username" id="your_name" placeholder="usernam" /> -->
                        </div>
                        <div class="form-group">
                        <x-label for="password" />
                        <x-input id="password" type="password" name="password" id="your_pass" placeholder="Password" required autocomplete="current-password" />
                            <!-- <input type="password" name="pass" id="your_pass" placeholder="Password" /> -->
                        </div>
                        <div class="form-group form-button">
                        @if (Route::has('password.request'))
                            <a class="forget" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                            </a><br>
                        @endif

                        <x-button class="form-submit" id="signin">
                            {{ __('Log in') }}
                        </x-button>
                            <!-- <input type="submit" name="signin" id="signin" class="form-submit" value="login" /> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('footer')