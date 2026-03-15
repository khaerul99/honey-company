<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds">
    {{-- Section Story --}}
    <section class="relative py-24 bg-white dark:bg-slate-950 overflow-hidden transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2 relative">
                    <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-700 aspect-[4/5] border-8 border-white dark:border-slate-800">
                        <img src="{{ $setting?->about_us_image ?? 'default-about-us.jpg' }}" alt="Tentang Honey Mood" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-amber-100 dark:bg-amber-900/20 rounded-[2rem] -z-10 rotate-12"></div>
                </div>

                <div class="lg:w-1/2">
                    <span class="text-amber-600 dark:text-amber-500 font-bold tracking-[0.2em] uppercase text-xs mb-6 block italic">Our Story</span>
                    <h1 class="text-5xl md:text-6xl font-black text-gray-900 dark:text-white leading-[1.1] mb-8 tracking-tighter">
                        Mengenal Lebih Dekat <br> 
                        <span class="text-amber-500 font-serif italic font-normal lowercase tracking-normal">{{ $setting->site_name }}</span>
                    </h1>
                    
                    {{-- PERBAIKAN: Prose agar RichEditor terbaca di Dark Mode --}}
                    <div class="prose prose-amber max-w-none prose-lg dark:prose-invert
                        prose-headings:text-gray-900 dark:prose-headings:text-white prose-headings:font-black
                        prose-p:text-gray-600 dark:prose-p:text-slate-300 prose-p:leading-relaxed
                        prose-ol:list-decimal prose-ol:pl-6
                        prose-li:text-gray-600 dark:prose-li:text-slate-300 prose-li:mb-2">
                        {!! $setting->about_us !!} 
                    </div>

                    {{-- Sosmed Dinamis --}}
                    <div class="mt-10 flex gap-4">
                        @foreach($sosmeds as $sosmed)
                            <a href="{{ $sosmed->url }}" target="_blank" class="w-12 h-12 rounded-2xl bg-gray-50 dark:bg-slate-900 flex items-center justify-center text-gray-900 dark:text-white hover:bg-amber-500 hover:text-white transition-all shadow-sm border border-transparent dark:border-slate-800">
                                <i class="{{ $sosmed->icon }} text-xl"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Nilai Kami --}}
    <section class="py-24 bg-gray-50/50 dark:bg-slate-900/50 transition-colors duration-500">
        <div class="container mx-auto px-6 text-center mb-16">
            <h2 class="text-3xl font-black text-gray-900 dark:text-white uppercase tracking-widest">Nilai <span class="text-amber-500">Kami</span></h2>
        </div>
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12">
            {{-- Card Visi --}}
            <div class="bg-white dark:bg-slate-900 p-10 rounded-[2.5rem] border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all duration-500 group">
                <div class="w-14 h-14 bg-amber-50 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-amber-600 dark:text-amber-500 mb-8 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <i class="fas fa-eye text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Visi Kami</h3>
                <p class="text-gray-500 dark:text-slate-400 leading-relaxed">Menjadi jembatan utama antara kebaikan alam dan kesehatan keluarga di seluruh Indonesia.</p>
            </div>

            {{-- Card Kualitas --}}
            <div class="bg-white dark:bg-slate-900 p-10 rounded-[2.5rem] border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all duration-500 group">
                <div class="w-14 h-14 bg-amber-50 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-amber-600 dark:text-amber-500 mb-8 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <i class="fas fa-award text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Kualitas Tanpa Kompromi</h3>
                <p class="text-gray-500 dark:text-slate-400 leading-relaxed">Hanya madu mentah (raw honey) pilihan yang lolos uji kemurnian yang kami kemas untuk Anda.</p>
            </div>

            {{-- Card Edukasi --}}
            <div class="bg-white dark:bg-slate-900 p-10 rounded-[2.5rem] border border-gray-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all duration-500 group">
                <div class="w-14 h-14 bg-amber-50 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-amber-600 dark:text-amber-500 mb-8 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <i class="fas fa-heart text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Edukasi Kesehatan</h3>
                <p class="text-gray-500 dark:text-slate-400 leading-relaxed">Berkomitmen mengedukasi masyarakat tentang cara hidup sehat melalui produk alami.</p>
            </div>
        </div>
    </section>

    {{-- Section Angka --}}
    <section class="py-24 bg-white dark:bg-slate-950 transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="bg-gray-900 dark:bg-slate-900 rounded-[3rem] p-12 md:p-20 flex flex-col md:flex-row gap-12 items-center justify-between shadow-2xl dark:shadow-none border border-white/5">
                <div class="text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Honey Mood <br> dalam Angka.</h2>
                    <p class="text-gray-400 dark:text-slate-500">Dedikasi kami untuk kualitas selama bertahun-tahun.</p>
                </div>
                
                <div class="grid grid-cols-2 gap-12 md:gap-24">
                    <div class="text-center">
                        <span class="block text-5xl font-black text-amber-500 mb-2">100%</span>
                        <span class="text-xs font-bold text-gray-500 dark:text-slate-500 uppercase tracking-widest">Madu Murni</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-5xl font-black text-amber-500 mb-2">50+</span>
                        <span class="text-xs font-bold text-gray-500 dark:text-slate-500 uppercase tracking-widest">Titik Panen</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Footer CTA --}}
    <section class="py-24 bg-white dark:bg-slate-950 transition-colors duration-500">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white mb-8">Siap Memulai Hidup Sehat <br> <span class="text-amber-500 font-serif italic lowercase font-normal tracking-normal">bersama kami?</span></h2>
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-4 bg-gray-900 dark:bg-amber-500 text-white dark:text-slate-900 px-10 py-5 rounded-3xl font-black text-lg hover:bg-amber-600 dark:hover:bg-amber-400 transition-all duration-300 shadow-xl dark:shadow-none">
                    Mulai Belanja Sekarang
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </section>
</x-layouts.layout>