<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" type="email" name="email" :value="old('email')" placeholder="example@gmail.com" required/>
            </div>
            <!-- Phone Address -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')"/>

                <x-input id="phone" type="tel" name="phone" :value="old('phone')" required placeholder="01_________" maxlength="11"/>
            </div>

            <div class="row">
                <div class="col-6">
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')"/>

                        <x-input id="password"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password"/>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                        <x-input id="password_confirmation"
                                 type="password"
                                 name="password_confirmation" required/>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-center flex-wrap mt-4">

                <a class="text-muted" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
