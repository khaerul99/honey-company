<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds"> 
    <section class="py-24 max-w-7xl mx-auto px-6 bg-white dark:bg-slate-950 overflow-hidden transition-colors duration-500">
        <div class="container mx-auto px-6">
            
            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-20 gap-8">
                <div class="max-w-2xl">
                    <span class="text-amber-600 dark:text-amber-500 font-bold tracking-[0.2em] uppercase text-xs mb-4 block italic">Honey Mood Journal</span>
                    
                    <h1 class="text-5xl md:text-6xl font-black text-gray-900 dark:text-white leading-[1.1] tracking-tighter">
                        Wawasan & <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-orange-600 font-serif lowercase tracking-normal">cerita madu murni.</span>
                    </h1>
                </div>
                <div class="lg:mb-2">
                    <p class="text-gray-400 dark:text-slate-500 max-w-xs text-lg font-medium leading-relaxed border-l-2 border-amber-100 dark:border-amber-900/50 pl-6">
                        Menjelajahi kebaikan alam melalui tulisan edukatif untuk gaya hidup lebih sehat.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16">
                @foreach($blogs as $item)
                <article class="group relative">
                    <div class="relative rounded-[2.5rem] overflow-hidden mb-8 aspect-[4/5] shadow-sm border border-gray-50 dark:border-slate-800 transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-amber-500/10">
                        <img src="{{ $item->image }}" 
                             class="w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-110" 
                             alt="{{ $item->title }}">
                        
                        {{-- Badge Category --}}
                        <div class="absolute top-6 left-6">
                            <span class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md text-gray-900 dark:text-slate-100 text-[10px] font-black uppercase tracking-[0.1em] px-5 py-2.5 rounded-full shadow-sm">
                                Health Tips
                            </span>
                        </div>

                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 dark:from-slate-950/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>

                    <div class="px-2">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="text-[11px] font-bold text-amber-600 dark:text-amber-500 uppercase tracking-widest">{{ $item->created_at->format('M d, Y') }}</span>
                            {{-- Line separator --}}
                            <div class="h-[1px] w-8 bg-amber-200 dark:bg-amber-900/50"></div>
                            <span class="text-[11px] font-bold text-gray-400 dark:text-slate-500 uppercase tracking-widest">{{ $item->author }}</span>
                        </div>

                        {{-- Judul Artikel --}}
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-slate-100 mb-4 leading-[1.3] group-hover:text-amber-600 dark:group-hover:text-amber-500 transition-colors duration-300">
                            <a href="{{ route('blog.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h2>

                        {{-- Excerpt --}}
                        <p class="text-gray-500 dark:text-slate-400 leading-relaxed mb-6 line-clamp-2 text-base">
                            {{ strip_tags($item->content) }}
                        </p>

                        {{-- Button Read Article --}}
                        <a href="{{ route('blog.show', $item->slug) }}" class="inline-flex items-center gap-3 group/link">
                            <span class="text-sm font-black uppercase tracking-widest text-gray-900 dark:text-white group-hover/link:text-amber-600 dark:group-hover/link:text-amber-500 transition-colors">Read Article</span>
                            <div class="w-10 h-10 rounded-full border border-gray-100 dark:border-slate-800 flex items-center justify-center group-hover/link:bg-amber-500 dark:group-hover/link:bg-amber-500 group-hover/link:border-amber-500 group-hover/link:text-white dark:group-hover/link:text-slate-900 transition-all duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-24 flex justify-center">
                <nav class="inline-flex p-2 bg-gray-50 dark:bg-slate-900 rounded-full border border-gray-100 dark:border-slate-800">
                    {{ $blogs->links('pagination::tailwind') }} 
                </nav>
            </div>
        </div>
    </section>
</x-layouts.layout>