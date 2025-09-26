<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- 🔹 Two-Factor Modal -->
    @if (session('show_2fa_modal'))
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                <div class="px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">
                        {{ __('Two-Factor Verification') }}
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ __('We sent a 6-digit code to') }} <strong>{{ session('email') }}</strong>.
                        {{ __('Enter it below to continue.') }}
                    </p>

                    <form method="POST" action="{{ route('verify.store') }}" class="mt-4">
                        @csrf
                        <input type="hidden" name="email" value="{{ session('email') }}">

                        <div>
                            <x-input-label for="code" :value="__('Verification Code')" />
                            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code"
                                required autofocus />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Verify') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</x-guest-layout>
