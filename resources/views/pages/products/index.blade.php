<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds"> 
    <section class="bg-gray-50/50 py-20 max-w-7xl mx-auto  px-6">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mb-16">
                <nav class="flex mb-4 text-sm text-amber-600 font-semibold tracking-wide uppercase">
                    <a href="/" class="hover:text-amber-700">Beranda</a>
                    <span class="mx-2 text-gray-300">/</span>
                    <span class="text-gray-400">Katalog Produk</span>
                </nav>
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight">
                    Koleksi Madu <br> <span class="text-amber-500">Murni Pilihan</span>
                </h1>
                <p class="mt-4 text-gray-500 text-lg">Pilih varian madu terbaik yang dipanen langsung dari alam untuk kesehatan Anda sekeluarga.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($products as $product)
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-gray-100 hover:border-amber-200 shadow-sm hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-500 flex flex-col h-full">
                    
                    <div class="relative overflow-hidden aspect-[4/5]">
                        <img src="{{ Storage::url($product->image) }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                             alt="{{ $product->name }}">
                        
                        <div class="absolute top-5 left-5">
                            <span class="bg-white/90 backdrop-blur-md text-gray-900 text-xs font-bold px-4 py-2 rounded-full shadow-sm">
                                {{ $product->weight }}
                            </span>
                        </div>

                        <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition-colors duration-500"></div>
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">
                                {{ $product->name }}
                            </h3>
                            <p class="text-gray-400 text-sm mt-1 uppercase tracking-widest font-semibold">Madu Murni</p>
                        </div>

                        <div class="mt-auto flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-400 font-medium uppercase tracking-tighter">Harga</span>
                                <span class="text-2xl font-black text-gray-900">
                                    <span class="text-sm font-bold text-amber-500">Rp</span> {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <a href="{{ route('products.show', $product->slug) }}" 
                               class="inline-flex items-center justify-center w-12 h-12 bg-gray-900 text-white rounded-2xl group-hover:bg-amber-500 group-hover:shadow-lg group-hover:shadow-amber-200 transition-all duration-300 active:scale-90">
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
                <div class="bg-white px-4 py-3 rounded-3xl border border-gray-100 shadow-sm">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

    <x-blog.blog :blogs="$latestBlogs" />

</x-layouts.layout>