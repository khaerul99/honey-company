@props(['products'])

<section id="produk" class="w-full max-w-7xl mx-auto py-24 px-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
        <div>
            <span class="text-amber-600 font-bold tracking-[0.2em] uppercase text-[10px] mb-2 block italic">Our Catalog</span>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 leading-none">Madu Pilihan</h2>
            <p class="text-slate-500 mt-2 text-sm">Kualitas murni dari peternakan kami.</p>
        </div>
        
        <a href="{{ route('products.index') }}" class="hidden md:flex items-center gap-2 font-bold text-slate-900 hover:text-amber-600 transition group">
            Lihat Semua Produk
            <div class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center group-hover:bg-amber-500 group-hover:border-amber-500 group-hover:text-white transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </div>
        </a>
    </div>

   <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-8">
        @foreach($products as $product)
        <div class="group relative bg-white rounded-4xl p-3 border border-slate-100 hover:shadow-2xl transition-all duration-500 cursor-pointer btn-detail"
             data-name="{{ $product->name }}"
             data-price="{{ number_format($product->price, 0, ',', '.') }}"
             data-description="{{ $product->description }}"
             data-image="{{ asset('storage/' . $product->image) }}"
             data-category="{{ $product->category->name }}">
            {{-- Content Card --}}
            <div class="relative aspect-square rounded-[1.5rem] overflow-hidden bg-slate-50 mb-4">
                <img src="{{ $product->image }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <span class="absolute top-3 left-3 bg-white/90 px-3 py-1 rounded-xl text-[10px] font-black uppercase tracking-wider text-slate-800 shadow-sm">
                    {{ $product->category->name }}
                </span>
            </div>
            <div class="px-2 pb-2 text-center">
                <h3 class="font-bold text-slate-900 text-sm lg:text-lg mb-1 line-clamp-1">{{ $product->name }}</h3>
                <p class="text-amber-600 font-black text-sm lg:text-xl">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-12 flex justify-center md:hidden">
        <a href="{{ route('products.index') }}" class="w-full text-center bg-slate-50 text-slate-900 font-bold py-4 rounded-2xl border border-slate-100">
            Lihat Semua Produk
        </a>
    </div>

    {{-- MODAL --}}
    <div id="productModal" class="hidden fixed inset-0 z-[100] flex items-end lg:items-center justify-center lg:p-6">
        
        <div id="closeOverlay" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-500"></div>

        <div id="modalBox" class="relative bg-white w-full lg:max-w-4xl lg:h-[550px] overflow-hidden shadow-2xl flex flex-col lg:flex-row transform translate-y-full lg:translate-y-0 lg:scale-95 lg:opacity-0 transition-all duration-500 rounded-t-[2rem] lg:rounded-[2.5rem] border border-slate-100">
            
            <button id="closeBtn" class="absolute top-5 right-5 z-50 bg-slate-900 text-white p-2.5 rounded-full hover:scale-110 transition shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="w-full lg:w-[40%] h-[300px] lg:h-full relative shrink-0">
                <img id="modalImg" src="" class="w-full h-full object-cover">
            </div>

            <div class="w-full lg:w-[60%] p-8 lg:p-12 flex flex-col bg-white">
                <div class="flex items-center gap-3 mb-4">
                    <span id="modalCat" class="text-amber-600 font-black tracking-widest uppercase text-[10px] bg-amber-50 px-3 py-1 rounded-md"></span>
                    <span class="w-8 h-px bg-slate-100"></span>
                </div>
                <h2 id="modalTitle" class="text-3xl lg:text-4xl font-extrabold text-slate-900 mb-2 tracking-tight"></h2>
                <p id="modalPrice" class="text-xl lg:text-2xl font-black text-amber-600 mb-6"></p>
                <div class="relative flex-1 min-h-0 mb-8 overflow-y-auto">
                    <div id="modalDesc" class="text-slate-500 leading-relaxed text-sm lg:text-base font-light italic pr-2"></div>
                </div>
                <div class="mt-auto">
                    <a id="modalWA" href="" target="_blank" class="w-full flex items-center justify-center gap-3 bg-slate-900 hover:bg-amber-600 text-white font-bold py-4 px-8 rounded-2xl transition shadow-xl active:scale-95 text-sm lg:text-base">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/modal-handler.js') }}"></script>