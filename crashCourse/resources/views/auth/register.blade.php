<x-components>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Your Account</h1>
                <p class="text-gray-600">Join us today and get started</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                <form action="{{ route('register') }}" method="post" class="space-y-6">
                    @csrf
                    
                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                            Username
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            id="username" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('username') border-red-500 ring-2 ring-red-500 @enderror" 
                            placeholder="Choose a unique username"
                            value="{{ old('username') }}"
                        >
                        @error('username')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200 @error('email') border-red-500 ring-2 ring-red-500 @enderror" 
                            placeholder="Enter your email address"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200" 
                            placeholder="Create a secure password"
                            required
                        >
                        <p class="mt-1 text-xs text-gray-500">
                            Password should be at least 8 characters long
                        </p>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirm Password
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200" 
                            placeholder="Confirm your password"
                            required
                        >
                        <p class="mt-1 text-xs text-gray-500">
                            Please re-enter your password to confirm
                        </p>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <input 
                            type="checkbox" 
                            name="terms" 
                            id="terms" 
                            class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500 focus:ring-2 mt-1"
                            required
                        >
                        <label for="terms" class="ml-3 text-sm text-gray-700">
                            I agree to the 
                            <a href="#" class="text-emerald-600 hover:text-emerald-500 font-medium transition-colors duration-200">
                                Terms of Service
                            </a> 
                            and 
                            <a href="#" class="text-emerald-600 hover:text-emerald-500 font-medium transition-colors duration-200">
                                Privacy Policy
                            </a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl"
                    >
                        Create Account
                    </button>

                    <!-- Security Notice -->
                    <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-4">
                        <p class="text-sm text-emerald-800 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            Your information is secure and encrypted
                        </p>
                    </div>
                </form>

                <!-- Additional Links -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="#" class="text-emerald-600 hover:text-emerald-500 font-medium transition-colors duration-200">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-components>