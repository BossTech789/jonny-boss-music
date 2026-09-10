<x-guest-layout>

    <div class="admin-login-page">

        <div class="login-card">

            <div class="login-header">
                <h1>Jonny Boss Admin</h1>
                <p>Sign in to manage your website</p>
            </div>

            @if (session('status'))
                <div class="login-status">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="admin@example.com"
                    >
                </div>

                <div class="form-group">

                    <div class="password-label">
                        <label for="password">Password</label>
                    </div>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    >

                </div>

                <div class="remember-row">

                    <label>
                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span>Remember me</span>
                    </label>

                </div>

                <button type="submit" class="login-button">
                    Login to Admin
                </button>

            </form>

        </div>

    </div>

</x-guest-layout>
