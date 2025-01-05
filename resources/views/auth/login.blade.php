<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Login</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto p-8">
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/50 p-4 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-8 border border-gray-200 dark:border-gray-700">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-white">Login</h1>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">
                        {{ __('Email') }}
                    </label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 dark:text-white text-gray-900 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm"
                           required 
                           autofocus 
                           autocomplete="username">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">
                        {{ __('Password') }}
                    </label>
                    <input id="password" 
                           type="password" 
                           name="password"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 dark:text-white text-gray-900 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm"
                           required 
                           autocomplete="current-password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" 
                           type="checkbox" 
                           name="remember"
                           class="rounded dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <div class="flex flex-col space-y-4">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                        {{ __('Log in') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition duration-200">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    
                    <a href="{{ route('register') }}" 
                       class="text-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition duration-200">
                        {{ __('Don\'t have an account? Register') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
