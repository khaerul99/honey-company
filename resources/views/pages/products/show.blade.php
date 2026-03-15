<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds">
    <section class="bg-white py-12 md:py-20 max-w-7xl mx-auto px-6">
        <div class="container mx-auto px-6">
            
            <nav class="flex items-center gap-2 text-sm font-medium mb-10 text-gray-400">
                <a href="/" class="hover:text-amber-600 transition uppercase">Beranda</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('products.index') }}" class="hover:text-amber-600 transition uppercase">Produk</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-gray-900 truncate uppercase">{{ $product->name }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
                
                <div class="lg:col-span-6">
                    <div class="sticky top-28">
                        <div class="relative group rounded-[2.5rem] overflow-hidden bg-gray-50 border border-gray-100">
                            <img src="{{ Storage::url($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-105">
                            
                            @if($product->stock > 0)
                            <div class="absolute top-6 left-6 bg-white/90 backdrop-blur px-4 py-2 rounded-2xl shadow-sm">
                                <span class="flex items-center gap-2 text-xs font-bold text-green-600 uppercase tracking-wider">
                                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    Tersedia
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6 flex flex-col justify-center">
                    <div class="mb-8">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-amber-50 text-amber-600 text-xs font-bold uppercase tracking-widest mb-4">
                            Premium Quality Honey
                        </span>
                        <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-4">
                            {{ $product->name }}
                        </h1>
                        <div class="flex items-center gap-6">
                            <span class="text-4xl font-bold text-gray-900 tracking-tight">
                                <span class="text-xl text-amber-600">Rp</span>{{ number_format($product->price, 0, ',', '.') }}
                            </span>
                            <div class="h-8 w-[1px] bg-gray-200"></div>
                            <span class="flex items-center gap-2 text-gray-500 font-medium">
                                <i class="fas fa-weight-hanging text-amber-500"></i>
                                {{ $product->weight }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h3 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-4">Deskripsi Produk</h3>
                        <div class="prose prose-amber max-w-none text-gray-500 leading-relaxed italic text-lg border-l-4 border-amber-100 pl-6">
                            {!! $product->description !!}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-10">
                        <div class="flex items-center gap-3 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <i class="fas fa-certificate text-amber-500"></i>
                            <span class="text-xs font-bold text-gray-700 uppercase">100% Murni</span>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-2xl bg-gray-50 border border-gray-100">
                            <i class="fas fa-truck text-amber-500"></i>
                            <span class="text-xs font-bold text-gray-700 uppercase">Aman Kirim</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <a href="https://wa.me/{{ $setting->whatsapp }}?text=Halo Honey Mood, saya ingin memesan {{ $product->name }} ({{ $product->weight }})." 
                           target="_blank"
                           class="flex items-center justify-center gap-4 w-full bg-green-500 text-white py-5 rounded-3xl font-bold text-xl hover:bg-green-600 hover:shadow-2xl hover:shadow-green-200 transition-all duration-300 transform active:scale-[0.98]">
                            <i class="fab fa-whatsapp text-2xl"></i>
                            Pesan via WhatsApp
                        </a>
                        <p class="text-center text-xs text-gray-400">
                            Pemesanan cepat tanpa daftar akun. Klik tombol di atas untuk terhubung langsung dengan admin.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.layout>