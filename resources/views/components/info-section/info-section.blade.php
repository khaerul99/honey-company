@props(['contents'])

<section class="w-full py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Judul Section (Opsional) --}}
        <div class="text-center mb-20">
            <span class="text-amber-600 font-black tracking-[0.3em] uppercase text-[10px] bg-amber-50 px-4 py-2 rounded-full">Why Choose Us</span>
            <h2 class="text-3xl lg:text-5xl font-extrabold text-slate-900 mt-6 tracking-tight">Kualitas yang <span class="italic text-amber-500">Berbicara</span></h2>
        </div>

        {{-- Grid Content Dinamis --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-20">
            @foreach($contents as $content)
            <div class="group relative flex flex-col items-start">
                {{-- Image Box --}}
                <div class="relative w-full aspect-video rounded-[2.5rem] overflow-hidden bg-slate-100 mb-8 border border-slate-50 shadow-sm transition-all duration-700 group-hover:shadow-2xl group-hover:shadow-amber-500/10 group-hover:-translate-y-2">
                    <img src="{{ $content->image }}" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                         alt="{{ $content->title }}">
                    
                    {{-- Overlay Subtle --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>

                {{-- Text Content --}}
                <div class="px-2">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="w-8 h-1 bg-amber-500 rounded-full"></span>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ $content->title }}</h3>
                    </div>
                    
                    <div class="text-slate-500 leading-relaxed font-light italic text-base lg:text-lg">
                        {!! $content->description !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

       
    </div>
</section>