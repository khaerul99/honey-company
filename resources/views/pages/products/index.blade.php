<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds"> 
    <section class="bg-gray-50/50 dark:bg-slate-950 py-20 max-w-7xl mx-auto px-6 transition-colors duration-500">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mb-16">
                <nav class="flex mb-4 text-sm text-amber-600 dark:text-amber-500 font-semibold tracking-wide uppercase">
                    <a href="/" class="hover:text-amber-700 dark:hover:text-amber-400">Beranda</a>
                    
                    <span class="mx-2 text-gray-300 dark:text-slate-800">/</span>
                    <span class="text-gray-400 dark:text-slate-600">Katalog Produk</span>
                </nav>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white leading-tight">
                    Koleksi Madu <br> <span class="text-amber-500">Murni Pilihan</span>
                </h1>
                <p class="mt-4 text-gray-500 dark:text-slate-400 text-lg">Pilih varian madu terbaik yang dipanen langsung dari alam untuk kesehatan Anda sekeluarga.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($products as $product)
                <div class="group bg-white dark:bg-slate-900 rounded-[2rem] overflow-hidden border border-gray-100 dark:border-slate-800 hover:border-amber-200 dark:hover:border-amber-900/50 shadow-sm hover:shadow-2xl hover:shadow-amber-500/10 dark:hover:shadow-amber-900/20 transition-all duration-500 flex flex-col h-full">
                    
                    <div class="relative overflow-hidden aspect-[4/5] bg-slate-50 dark:bg-slate-800">
                        <img src="{{ $product->image }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                             alt="{{ $product->name }}">
                        
                        <div class="absolute top-5 left-5">
                            <span class="bg-white/90 dark:bg-slate-950/90 backdrop-blur-md text-gray-900 dark:text-slate-100 text-xs font-bold px-4 py-2 rounded-full shadow-sm border border-transparent dark:border-white/10">
                                {{ $product->weight }}
                            </span>
                        </div>

                        <div class="absolute inset-0 bg-black/5 dark:bg-black/20 group-hover:bg-transparent transition-colors duration-500"></div>
                    </div>

                    <div class="p-8 flex flex-col flex-grow bg-white dark:bg-slate-900">
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-slate-100 group-hover:text-amber-600 dark:group-hover:text-amber-500 transition-colors duration-300">
                                {{ $product->name }}
                            </h3>
                            <p class="text-gray-400 dark:text-slate-500 text-sm mt-1 uppercase tracking-widest font-semibold">Madu Murni</p>
                        </div>

                        <div class="mt-auto flex items-center justify-between pt-6 border-t border-gray-50 dark:border-slate-800">
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-400 dark:text-slate-600 font-medium uppercase tracking-tighter">Harga</span>
                                <span class="text-2xl font-black text-gray-900 dark:text-white">
                                    <span class="text-sm font-bold text-amber-500">Rp</span> {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <a href="{{ route('products.show', $product->slug) }}" 
                               class="inline-flex items-center justify-center w-12 h-12 bg-gray-900 dark:bg-amber-500 text-white dark:text-slate-950 rounded-2xl group-hover:bg-amber-500 dark:group-hover:bg-amber-400 group-hover:shadow-lg group-hover:shadow-amber-200 dark:group-hover:shadow-none transition-all duration-300 active:scale-90">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-20 flex justify-center">
                <div class="bg-white dark:bg-slate-900 px-4 py-3 rounded-3xl border border-gray-100 dark:border-slate-800 shadow-sm transition-colors duration-500">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

    <x-blog.blog :blogs="$latestBlogs" />

</x-layouts.layout>