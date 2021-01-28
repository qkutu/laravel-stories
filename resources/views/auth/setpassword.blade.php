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

        <form method="POST" action="{{ route('setpassword.store') }}">
            @csrf

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

            <!-- Confirm Password -->
            <div class="form-group row">
                <x-label for="re-password" :value="__('Confirm Password')" />
                <div class="col-md-6">
                    <x-input id="re-password" class="mb-3 form-control"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="current-password" />
                </div>
            </div>

            <div class="mt-3 text-right form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <x-button class="ml-3 w-50">
                        {{ __('Set Password') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
