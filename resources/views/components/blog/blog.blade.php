@props(['blogs', 'title' => 'Edukasi & Tips Madu', 'subtitle' => 'Pelajari lebih lanjut tentang manfaat kebaikan alam untuk kesehatan harian Anda.'])

<section {{ $attributes->merge(['class' => 'py-24 bg-white w-full max-w-7xl mx-auto px-6']) }}>
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="max-w-xl">
                <h2 class="text-3xl text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-orange-600 font-serif lowercase tracking-normal">{!! $title !!}</h2>
                <p class="text-gray-500 text-lg">{{ $subtitle }}</p>
            </div>
            <a href="{{ route('blog.index') }}" class="group flex items-center gap-2 font-bold text-gray-900 hover:text-amber-600 transition-colors">
                Lihat Semua Artikel
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @forelse($blogs as $blog)
            <div class="group cursor-pointer" onclick="window.location='{{ route('blog.show', $blog->slug) }}'">
                <div class="relative aspect-video rounded-[2rem] overflow-hidden mb-6 border border-gray-100 shadow-sm">
                    <img src="{{ $blog->image }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div>
                    <span class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-3 block">Honey Mood Journal</span>
                    <h3 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-amber-600 transition-colors line-clamp-2">
                        {{ $blog->title }}
                    </h3>
                    <div class="mt-4 flex items-center gap-3 text-sm text-gray-400 font-medium">
                        <span>{{ $blog->author }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span>{{ $blog->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-400 italic">Belum ada artikel terbaru.</p>
            @endforelse
        </div>
    </div>
</section>