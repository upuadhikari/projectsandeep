    <div class="footer">
        <div class="container-fluid mt-3 px-0">
            <div class="footer-basic">
                <footer>
                    <div class="social mt-3"><a class="mt-3" href="#"><i class="icon ion-social-facebook"></i></a></div>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="/">Home</a></li>
                        @auth
                        <li class="list-inline-item"><a href="{{ url('/profile') }}">Profile</a></li>
                        <li class="list-inline-item"><a href="{{ route('logout') }}">{{ __('Log out') }}</a></li>

                        @else
                        <li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                        <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                    <p class="copyright">OkayShop © 2021</p>
                </footer>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    </body>
</html>