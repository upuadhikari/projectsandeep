@include('header')



<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />

<!-- Sign up form -->
<section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <x-label for="name" />
                        <x-input id="name" type="text" name="name" required autofocus placeholder="Username" />
                            <!-- <input type="text" name="username" id="name" placeholder="Username" /> -->
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name" />
                        </div> -->

                        <div class="form-group">
                        <x-label for="fullname" />
                        <x-input id="name" type="text" name="fullname" required placeholder="Full Name" />
                            <!-- <input type="text" name="username" id="name" placeholder="Username" /> -->
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                        <x-label for="email" />
                        <x-input id="email" type="email" name="email"  placeholder="Your Email" required />
                            <!-- <input type="email" name="email" id="email" placeholder="Your Email" /> -->
                        </div>
                        <div class="form-group">
                        <x-label for="password" />
                        <x-input id="password"  type="password" name="password" required placeholder="Password" autocomplete="new-password" />
                        </div>
                        <div class="form-group">
                        <x-label for="password_confirmation" />
                        <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                            <!-- <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" /> -->
                        </div>

                        <div class="form-group">
                        <x-label for="address" />
                        <x-input id="name"  type="text" name="address" required placeholder="Address" />
                        </div>
                        
                        <div class="form-group">
                        <x-label for="mobile" />
                        <x-input id="name"  type="number" name="mobile" required placeholder="Mobile" />
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlFile1"></label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="picture">
                        </div>

                        <div class="form-group form-button">
                        <x-button class="form-submit" id="signup">
                            {{ __('Register') }}
                        </x-button>
                            <!-- <input type="submit" name="signup" id="signup" class="form-submit" value="register" /> -->
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img class="my-auto" src="images/signup-image.png" alt="sing up image"></figure>
                    <a href="{{ route('login') }}" class="signup-image-link">Already a member? Log in.</a>
                </div>
            </div>
        </div>
    </section>
        
    </x-auth-card>
</x-guest-layout>

@include ('footer')