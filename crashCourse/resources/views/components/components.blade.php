<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/js/app.js' , 'resources/css/app.css'])
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 text-slate-900 min-h-screen">
    <header class="bg-white shadow-sm border-b border-slate-200/50 sticky top-0 z-50 backdrop-blur-sm bg-white/95">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 w-full">
                <!-- Logo/Home Link -->
                <div class="flex items-center">
                    <a href="{{route('posts.index')}}" class="text-xl font-bold text-slate-900 hover:text-indigo-600 transition-colors duration-200 flex items-center space-x-2">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                        <span>{{env('APP_NAME')}}</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-4">
                    @guest
                        <div class="flex items-center space-x-2">
                            <a href="{{route('login')}}" class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200">
                                Login
                            </a>
                            <a href="{{route('register')}}" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                Register
                            </a>
                        </div>
                    @endguest

                    @auth
                        <div class="relative" x-data="{open: false}" @click.outside="open = false">
                            <!-- User Avatar Button -->
                            <button 
                                x-on:click="open = !open" 
                                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-slate-100 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                <img 
                                    src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg" 
                                    class="w-10 h-10 rounded-full border-2 border-slate-200 hover:border-indigo-300 transition-colors duration-200"
                                    alt="User avatar"
                                >
                                <div class="hidden sm:flex items-center space-x-1">
                                    <span class="text-sm font-medium text-slate-700">{{auth()->user()->username}}</span>
                                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </button>

                            <!-- Dropdown Menu -->
                            <div 
                                x-show="open" 
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-slate-200 py-2 z-50"
                            >
                                <!-- User Info Header -->
                                <div class="px-4 py-3 border-b border-slate-100">
                                    <p class="text-sm font-medium text-slate-900">{{auth()->user()->username}}</p>
                                    <p class="text-xs text-slate-500">{{auth()->user()->email ?? 'Welcome back!'}}</p>
                                </div>

                                <!-- Menu Items -->
                                <div class="py-1">
                                    <a href="{{route('dashboard')}}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-indigo-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                        </svg>
                                        Dashboard
                                    </a>

                                    <a href="{{route('posts.index')}}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-indigo-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9m1.5-2-1.5 1.5-1.5-1.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Posts
                                    </a>

                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-indigo-600 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Settings
                                    </a>
                                </div>

                                <!-- Logout Section -->
                                <div class="border-t border-slate-100 pt-1">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button class="flex items-center w-full px-4 py-2 text-sm text-red-700 hover:bg-red-50 hover:text-red-800 transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>
    
</body>
</html>