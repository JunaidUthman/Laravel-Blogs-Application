<x-components>
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-3xl p-8 mb-8 shadow-xl">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-indigo-600 font-bold text-xl">
                    {{strtoupper(substr(auth()->user()->username, 0, 1))}}
                </div>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-white mb-1">Welcome back, {{auth()->user()->username}}!</h1>
                <p class="text-indigo-100">Ready to share something amazing today?</p>
            </div>
        </div>
    </div>

    <!-- Create Post Section -->
    <div class="bg-white rounded-3xl p-8 mb-8 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center space-x-3 mb-6">
            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-slate-900">Create a New Post</h2>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 rounded-2xl p-4 mb-6 flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <p class="text-green-800 font-medium">{{session('success')}}</p>
            </div>
        @endif
        
        <form action="{{route('posts.store')}}" method="post" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label for="title" class="block text-sm font-semibold text-slate-700">Post Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('title') ring-2 ring-red-500 border-red-500 @enderror" 
                    placeholder="Enter an engaging title for your post"
                >
                @error('title')
                    <p class="text-red-600 text-sm font-medium flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{$message}}</span>
                    </p>
                @enderror
            </div>
            
            <div class="space-y-2">
                <label for="body" class="block text-sm font-semibold text-slate-700">Post Content</label>
                <textarea 
                    name="body" 
                    id="body"
                    rows="8" 
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 resize-none @error('body') ring-2 ring-red-500 border-red-500 @enderror" 
                    placeholder="Share your thoughts, ideas, or story here..."
                ></textarea>
                @error('body')
                    <p class="text-red-600 text-sm font-medium flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{$message}}</span>
                    </p>
                @enderror
            </div>

            <button 
                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-4 px-6 rounded-xl font-semibold text-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl hover:scale-[1.02] flex items-center justify-center space-x-2" 
                type="submit"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <span>Publish Post</span>
            </button>
        </form>
    </div>

    <!-- Posts Section -->
    <div class="mb-6">
        <div class="flex items-center space-x-3 mb-6">
            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-900">Your Latest Posts</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white rounded-3xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 hover:scale-[1.02] group">
                <div class="mb-4">
                    <h2 class="font-bold text-xl text-slate-900 mb-2 group-hover:text-indigo-600 transition-colors duration-200">
                        {{$post->title}}
                    </h2>

                    <div class="flex items-center space-x-2 text-sm text-slate-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Posted {{$post->created_at->diffForHumans()}} by</span>
                        <a href="" class="text-indigo-600 hover:text-indigo-700 font-semibold transition-colors duration-200">{{$post->user->username}}</a>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-slate-700 leading-relaxed">{{$post->body}}</p>
                </div>

                <div class="flex gap-3" x-data="{ open: false }">
                    <!-- Update Button -->
                    <div class="flex-1">
                        <button 
                            class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white py-3 px-4 rounded-xl font-semibold hover:from-green-600 hover:to-emerald-600 transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center space-x-2" 
                            @click="open = true" 
                            type="button"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            <span>Update</span>
                        </button>
                    </div>
                    
                    <!-- Update Modal -->
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4"
                        style="display: none;"
                    >
                        <div 
                            class="bg-white rounded-3xl shadow-2xl w-full max-w-md relative transform transition-all duration-300"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                        >
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="font-bold text-xl text-slate-900">Update Post</h2>
                                    <button 
                                        class="w-8 h-8 bg-slate-100 hover:bg-slate-200 rounded-full flex items-center justify-center transition-colors duration-200" 
                                        @click="open = false"
                                    >
                                        <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="title-{{ $post->id }}" class="block text-sm font-semibold text-slate-700 mb-2">Post Title</label>
                                        <input 
                                            type="text" 
                                            name="title" 
                                            id="title-{{ $post->id }}" 
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200"
                                            value="{{ $post->title }}"
                                            required
                                        >
                                    </div>
                                    
                                    <div>
                                        <label for="body-{{ $post->id }}" class="block text-sm font-semibold text-slate-700 mb-2">Post Content</label>
                                        <textarea 
                                            name="body" 
                                            id="body-{{ $post->id }}" 
                                            rows="6" 
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 resize-none"
                                            required
                                        >{{ $post->body }}</textarea>
                                    </div>

                                    <button 
                                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2" 
                                        type="submit"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>Update Post</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Button -->
                    <div class="flex-1">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.');" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="w-full bg-gradient-to-r from-red-500 to-rose-500 text-white py-3 px-4 rounded-xl font-semibold hover:from-red-600 hover:to-rose-600 transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center space-x-2"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                <span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-components>