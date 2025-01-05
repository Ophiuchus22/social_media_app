<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Register</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto p-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-8 border border-gray-200 dark:border-gray-700">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-white">Register</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">
                        {{ __('Name') }}
                    </label>
                    <input id="name" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 dark:text-white text-gray-900 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm"
                           required 
                           autofocus 
                           autocomplete="name">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

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
                           autocomplete="username">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Birthdate -->
                <div class="mb-6">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">
                        {{ __('Birth Date') }}
                    </label>
                    <input id="birthdate" 
                           type="date" 
                           name="birthdate" 
                           value="{{ old('birthdate') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 dark:text-white text-gray-900 shadow-sm"
                           max="{{ now()->subYears(13)->format('Y-m-d') }}"
                           required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">You must be at least 13 years old to register.</p>
                    @error('birthdate')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="mb-6">
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">
                        {{ __('Gender') }}
                    </label>
                    <select id="gender" 
                            name="gender" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 dark:text-white text-gray-900 shadow-sm"
                            required>
                        <option value="">Select gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
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
                           autocomplete="new-password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">
                        {{ __('Confirm Password') }}
                    </label>
                    <input id="password_confirmation" 
                           type="password" 
                           name="password_confirmation"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-transparent dark:bg-gray-700 dark:text-white text-gray-900 placeholder-gray-400 dark:placeholder-gray-500 shadow-sm"
                           required 
                           autocomplete="new-password">
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col space-y-4">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
                        {{ __('Register') }}
                    </button>

                    <a href="{{ route('login') }}" 
                       class="text-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition duration-200">
                        {{ __('Already registered? Login') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
