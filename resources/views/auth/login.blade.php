<x-guest-layout>
    <x-auth-card class="container">
        <x-slot name="logo">
            <a href="/">
                <x-application-logo height="30px" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group row">
                <x-label for="email" :value="__('E-Mail Address')" />
                <div class="col-md-6">
                    <x-input id="email" class="mb-3 form-control" type="email" name="email" :value="old('email')" required />
                </div>
            </div>

            <!-- Password -->
            <div class="form-group row">
                <x-label for="password" :value="__('Password')" />
                <div class="col-md-6">
                    <x-input id="password" class="mb-3 form-control"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                </div>
            </div>
            <!-- Remember Me -->
            <div class="form-group row">
                <x-label for="password" :value="__('Remember Me')" />
                <div class="mt-2 col-sm-6">
                    <input id="remember_me" type="checkbox" class="" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </div>
                </label>
            </div>

            <div class="mt-3 text-right form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ml-3 w-50">
                        {{ __('Login') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
