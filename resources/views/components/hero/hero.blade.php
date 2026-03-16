@props(['heros'])


<section class="w-full mx-auto max-w-7xl md:mt-6 overflow-hidden md:rounded-[2.5rem] bg-slate-900 dark:bg-slate-900 transition-colors duration-500">
    @foreach($heros as $hero)
    <div class="relative min-h-[600px] lg:min-h-[500px] lg:aspect-[21/9] flex items-center px-6 lg:px-20 py-20">
        
        <div class="absolute inset-0">
            <img src="{{ $hero->image }}" class="w-full h-full object-cover" alt="{{ $hero->title }}">
            
          
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/60 to-transparent"></div>
           
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent lg:hidden"></div>
        </div>

        <div data-aos="fade-right" data-aos-delay="200" class="relative z-10 max-w-2xl">
       
            <span class="inline-block px-4 py-1.5 mb-4 text-xs font-bold tracking-widest text-amber-400 uppercase bg-amber-400/10 border border-amber-400/20 rounded-full">
                {{ $hero->subtitle ?? 'Murni & Alami' }}
            </span>

            <h1 class="text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-[0.9] tracking-tight">
                {!! str_replace(' ', '<br class="hidden lg:block">', $hero->title) !!}
            </h1>

            <p class="text-lg lg:text-xl text-slate-200 dark:text-slate-300 mb-10 leading-relaxed max-w-lg line-clamp-3 lg:line-clamp-none font-light">
                {{ $hero->description }}
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#produk" class="inline-flex items-center justify-center px-8 py-4 bg-amber-500 hover:bg-amber-400 text-slate-900 font-bold rounded-2xl transition-all shadow-xl shadow-amber-500/20 dark:shadow-amber-900/10 group">
                    Lihat Produk
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
                
                <a href="#tentang" class="inline-flex items-center justify-center px-8 py-4 bg-white/10 dark:bg-white/5 hover:bg-white/20 text-white font-semibold rounded-2xl backdrop-blur-md border border-white/10 transition">
                    Tentang Kami
                </a>
            </div>
        </div>
    </div>
    @break
    @endforeach
</section>