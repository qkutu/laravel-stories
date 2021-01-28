<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo height="30px" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group row">
                <x-label for="name" :value="__('Name')" />
                <div class="col-sm-6">
                    <x-input id="name" class="form-control mb-3" type="text" name="name" :value="old('name')" required autofocus />
                </div>
            </div>

            <!-- Email Address -->
            <div class="form-group row">
                <x-label for="email" :value="__('Email')" />
                <div class="col-sm-6">
                    <x-input id="email" class="form-control mb-3" type="email" name="email" :value="old('email')" required />
                </div>
            </div>

            <!-- Password -->
            <div class="form-group row">
                <x-label for="password" :value="__('Password')" />
                <div class="col-sm-6">
                    <x-input id="password" class="form-control mb-3"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group row">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <div class="col-sm-6">
                    <x-input id="password_confirmation" class="form-control mb-3"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
            </div>

            <div class="form-group row text-right">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4 w-50">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
