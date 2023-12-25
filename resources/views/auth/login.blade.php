<x-guest-layout>


    <p class="text-center">
        Selamat datang di website {{ company_config('name') ?? config('app.name')}}
    </p>
    <x-jet-validation-errors class="mb-3" />

    @if (session('status'))
    <div class="alert alert-success mb-3 rounded-0" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">

            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email"
                :value="old('email')" required placeholder="{{ __('email') }}" />
            <x-jet-input-error for="email"></x-jet-input-error>
        </div>

        <div class="mb-3">

            <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                name="password" required placeholder="{{ __('Password') }}" autocomplete="current-password" />
            <x-jet-input-error for="password"></x-jet-input-error>
        </div>

        <div class="mb-3">
            <div class="custom-control custom-checkbox">
                <x-jet-checkbox id="remember_me" name="remember" />
                <label class="custom-control-label" for="remember_me">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                @if (Route::has('password.request'))
                <a class=" mr-3" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
                <button class="btn btn-login">{{ __('Log in') }}</button>
            </div>
        </div>
    </form>

</x-guest-layout>