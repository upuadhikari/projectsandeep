<!-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100"> -->
    <!-- Primary Navigation Menu -->
    <!-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex"> -->

            <!-- Settings Dropdown -->
            <!-- <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button>
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot> -->

                    <!-- <x-slot name="content"> -->
                        <!-- Authentication -->
                        <form method="GET" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>


<!-- 
            <div class="mt-3 space-y-1"> -->
                <!-- Authentication -->
                <!-- <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form> -->
            <!-- </div> -->
        </div>
    </div>
</nav>
