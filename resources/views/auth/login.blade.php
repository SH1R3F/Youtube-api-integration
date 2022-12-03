<x-guest-layout>
    <div class="container">
        <div class="flex items-center justify-center gap-12">
            <div class="hidden lg:block w-1/2">
                <img src="{{ asset('images/intro.svg') }}" alt="Control your data">
            </div>
            <div>
                <x-jet-authentication-card>
                    <div class="mb-7">
                        <h1 class="text-3xl font-cairo">Welcome :)</h1>
                        <p class="text-gray-500">Login so you can use our website</p>
                    </div>

                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" placeholder="Your email" required autofocus />
                        </div>

                        <div class="mt-2">
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                placeholder="Password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-jet-button class="ml-4">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </form>
                </x-jet-authentication-card>
            </div>
        </div>
    </div>

</x-guest-layout>
