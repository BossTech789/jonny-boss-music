<x-guest-layout>

```
<div class="admin-login-page">

    <div class="admin-login-card">

        {{-- Logo / Brand --}}
        <div class="admin-login-brand">

            <div class="admin-logo">
                JB
            </div>

            <h1>Jonny Boss</h1>

            <p>ADMINISTRATION PANEL</p>

        </div>


        {{-- Login heading --}}
        <div class="admin-login-heading">

            <h2>Welcome Back</h2>

            <p>
                Sign in to manage your website.
            </p>

        </div>


        {{-- Validation errors --}}
        @if ($errors->any())

            <div class="login-errors">

                @foreach ($errors->all() as $error)

                    <p>{{ $error }}</p>

                @endforeach

            </div>

        @endif


        {{-- Session status --}}
        @if (session('status'))

            <div class="login-status">
                {{ session('status') }}
            </div>

        @endif


        {{-- Login form --}}
        <form
            method="POST"
            action="{{ route('login') }}"
            class="admin-login-form"
        >

            @csrf


            {{-- Email --}}
            <div class="login-field">

                <label for="email">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your admin email"
                >

            </div>


            {{-- Password --}}
            <div class="login-field">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                >

            </div>


            {{-- Remember me / forgot password --}}
            <div class="login-options">

                <label class="remember-me">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    <span>
                        Remember me
                    </span>

                </label>


                @if (Route::has('password.request'))

                    <a href="{{ route('password.request') }}">
                        Forgot password?
                    </a>

                @endif

            </div>


            {{-- Login button --}}
            <button
                type="submit"
                class="admin-login-button"
            >
                <span>Login to Dashboard</span>

                <span class="login-arrow">
                    →
                </span>
            </button>

        </form>


        {{-- Footer --}}
        <div class="admin-login-footer">

            <span>
                Jonny Boss
            </span>

            <span>
                •
            </span>

            <span>
                Admin Portal
            </span>

        </div>

    </div>

</div>
```

</x-guest-layout>
