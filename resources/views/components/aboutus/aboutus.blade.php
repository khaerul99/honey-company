@props(['setting'])

<section id="tentang" class="w-full max-w-7xl mx-auto py-24 px-6 lg:px-10 overflow-hidden">
    <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
        
        <div class="w-full lg:w-1/2 relative">
            {{-- Foto Utama --}}
            <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white dark:border-slate-800">
                <img src="{{ asset('storage/' . ($setting?->about_us_image ?? 'default-about-us.jpg')) }}" 
                     alt="Peternakan Madu Honey Lebah" 
                     class="w-full h-100 lg:h-150 object-cover hover:scale-105 transition duration-1000">
            </div>
            
            {{-- Aksen Dekorasi: Floating Card --}}
            <div class="absolute -bottom-10 -right-6 lg:right-0 z-20 bg-amber-500 p-8 rounded-4xl shadow-2xl max-w-50 lg:max-w-62.5 transform hover:-translate-y-2 transition duration-500">
                <p class="text-4xl lg:text-5xl font-black text-slate-900 mb-2 italic tracking-tighter">100%</p>
                <p class="text-xs lg:text-sm font-bold uppercase tracking-[0.2em] text-slate-900/80 leading-tight">
                    Madu Murni Tanpa Campuran
                </p>
            </div>

            {{-- Background Blur Decor --}}
            <div class="absolute -top-10 -left-10 w-64 h-64 bg-amber-200 rounded-full blur-[80px] opacity-30 z-0"></div>
        </div>

        <div class="w-full lg:w-1/2">
            <div class="flex items-center gap-4 mb-6">
                <span class="text-amber-600 font-black tracking-[0.3em] uppercase text-xs">Our Heritage</span>
                <div class="w-12 h-px bg-amber-200"></div>
            </div>

            <h2 class="text-4xl lg:text-6xl font-extrabold text-slate-900 dark:text-white mb-8 tracking-tight leading-[1.1]">
                Kebaikan Alam <br>
                <span class="text-amber-500 italic font-black">Untuk Kesehatan</span> Anda.
            </h2>
            
            {{-- Render konten dari RichEditor Filament --}}
            <div class="prose prose-slate prose-lg dark:prose-invert max-w-none text-slate-500 dark:text-slate-400 mb-10 leading-relaxed font-light italic">
                {!! $setting?->about_us ?? 'Honey Lebah berkomitmen menghadirkan madu hutan terbaik yang dipanen dengan penuh rasa hormat terhadap alam. Setiap tetesnya adalah bukti kemurnian dari peternakan lebah kami.' !!}
            </div>

            {{-- Checklist Keunggulan --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="font-bold text-slate-700 dark:text-slate-300">Organik & Segar</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="font-bold text-slate-700 dark:text-slate-300">Uji Laboratorium</span>
                </div>
            </div>

            <a href="#produk" class="inline-flex items-center gap-3 text-slate-900 dark:text-white font-black group uppercase tracking-widest text-sm">
                Lihat Koleksi Kami
                <span class="w-10 h-10 rounded-full border border-slate-200 dark:border-slate-700 flex items-center justify-center group-hover:bg-slate-900 group-hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </span>
            </a>
        </div>

    </div>
</section>