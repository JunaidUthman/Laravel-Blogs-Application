<x-components>
    <div class="space-y-6">
        @foreach ($posts as $post)
            <article class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-slate-200/50 hover:border-indigo-200">
                <!-- Post Header -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-slate-100">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-slate-900 mb-2 hover:text-indigo-600 transition-colors duration-200 cursor-pointer">
                                {{$post->title}}
                            </h2>
                            
                            <div class="flex items-center space-x-4 text-sm text-slate-600">
                                <!-- Author Info -->
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-medium text-sm">
                                        {{strtoupper(substr($post->user->username ?? 'U', 0, 1))}}
                                    </div>
                                    <div>
                                        <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium transition-colors duration-200">
                                            {{$post->user->username ?? 'Anonymous'}}
                                        </a>
                                    </div>
                                </div>

                                <!-- Separator -->
                                <div class="w-1 h-1 bg-slate-400 rounded-full"></div>

                                <!-- Time Info -->
                                <div class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-slate-500">{{$post->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Post Actions -->
                        <div class="flex items-center space-x-2 ml-4">
                            <button class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-lg transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Post Content -->
                <div class="px-6 py-5">
                    <div class="prose prose-slate max-w-none">
                        <p class="text-slate-700 leading-relaxed">
                            {{$post->body}}
                        </p>
                    </div>
                </div>

                <!-- Post Footer -->
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                    <div class="flex items-center justify-between">
                        <!-- Engagement Stats -->
                        <div class="flex items-center space-x-6">
                            <button class="flex items-center space-x-2 text-slate-500 hover:text-red-500 transition-colors duration-200 group">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span class="text-sm font-medium">{{$post->likes_count ?? 0}}</span>
                            </button>

                            <button class="flex items-center space-x-2 text-slate-500 hover:text-blue-500 transition-colors duration-200 group">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <span class="text-sm font-medium">{{$post->comments_count ?? 0}}</span>
                            </button>

                            <button class="flex items-center space-x-2 text-slate-500 hover:text-green-500 transition-colors duration-200 group">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                                <span class="text-sm font-medium">Share</span>
                            </button>
                        </div>

                        <!-- Read More / Category -->
                        <div class="flex items-center space-x-3">
                            @if($post->category ?? false)
                                <span class="px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-700 rounded-full">
                                    {{$post->category}}
                                </span>
                            @endif
                            
                            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors duration-200 flex items-center space-x-1">
                                <span>Read more</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

        <!-- Empty State -->
        @if($posts->isEmpty())
            <div class="text-center py-12">
                <svg class="w-24 h-24 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-lg font-medium text-slate-900 mb-2">No posts yet</h3>
                <p class="text-slate-500 mb-4">Be the first to share something with the community!</p>
                <a href="#" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create Post
                </a>
            </div>
        @endif
    </div>
</x-components>