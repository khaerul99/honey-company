<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds">
    <article class="py-20 bg-white dark:bg-slate-950 transition-colors duration-500">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-12">
                <nav class="flex justify-center items-center gap-2 text-xs font-bold text-amber-600 dark:text-amber-500 uppercase tracking-widest mb-6">
                    <a href="{{ route('blog.index') }}">Blog</a>
                    <span class="text-gray-300 dark:text-slate-700">/</span>
                    <span class="text-gray-400 dark:text-slate-500 italic">Article Detail</span>
                </nav>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white leading-tight mb-8">{{ $blog->title }}</h1>
                
                <div class="flex justify-center items-center gap-6 text-gray-400 dark:text-slate-500 font-semibold text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center text-amber-600 dark:text-amber-500">
                            <i class="fas fa-user text-[10px]"></i>
                        </div>
                        <span class="dark:text-slate-400">{{ $blog->author }}</span>
                    </div>
                    <div class="h-4 w-[1px] bg-gray-200 dark:bg-slate-800"></div>
                    <span class="dark:text-slate-400">{{ $blog->created_at->format('d F Y') }}</span>
                </div>
            </div>

            <div class="rounded-[2.5rem] overflow-hidden shadow-2xl mb-16 aspect-video border border-transparent dark:border-slate-800">
                <img src="{{ $blog->image }}" class="w-full h-full object-cover">
            </div>

            <div class="prose prose-amber max-w-none prose-lg dark:prose-invert 
                prose-headings:text-gray-900 dark:prose-headings:text-white prose-headings:font-black
                prose-p:text-gray-600 dark:prose-p:text-slate-300 prose-p:leading-relaxed
                prose-ol:list-decimal prose-ol:pl-6
                prose-li:text-gray-600 dark:prose-li:text-slate-300 prose-li:mb-2">
    
                {!! $blog->content !!}

            </div>

            <div class="mt-20 border-t border-gray-100 dark:border-slate-800 pt-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="font-bold text-gray-900 dark:text-white uppercase tracking-widest text-sm italic">Honey Mood Journal</p>
                <div class="flex gap-4">
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 flex items-center justify-center hover:bg-green-600 hover:text-white transition-all border border-transparent dark:border-green-900/50">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </article>
</x-layouts.layout>