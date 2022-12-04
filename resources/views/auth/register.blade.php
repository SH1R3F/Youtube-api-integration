<x-guest-layout>
    <div class="container">
        <div class="lg:w-1/3 mx-auto">
            <x-jet-authentication-card>
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" required />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>
                <!-- Social Media Login -->
                <h3 class="text-xl text-gray-700 my-3">Or login with social media</h3>
                <div class="mb-3 table border-spacing-1">
                    {{-- <a href="/auth/facebook/redirect"
                            class="bg-blue-600 text-white rounded-full hover:bg-blue-500 transition-all table-cell align-middle text-center h-9 w-9">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a> --}}
                    <a href="/auth/github/redirect"
                        class="bg-gray-600 text-white rounded-full hover:bg-gray-500 transition-all table-cell align-middle text-center h-9 w-9">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="/auth/linkedin/redirect"
                        class="bg-blue-800 text-white rounded-full hover:bg-blue-700 transition-all table-cell align-middle text-center h-9 w-9">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="/auth/google/redirect"
                        class="bg-gray-600 text-white rounded-full hover:bg-gray-500 transition-all table-cell align-middle text-center h-9 w-9">
                        <i class="fa-brands fa-google"></i>
                    </a>
                </div>
                <!-- Social Media Login -->
            </x-jet-authentication-card>
        </div>
    </div>
</x-guest-layout>
