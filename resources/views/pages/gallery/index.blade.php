<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds">
    {{-- Main Section: Tambah dark:bg-slate-950 --}}
    <section class="py-24 bg-white dark:bg-slate-950 max-w-7xl mx-auto px-6 transition-colors duration-500">
        <div class="container mx-auto px-6">
            
            <div class="max-w-2xl mb-20" data-aos="fade-right">
                <span class="text-amber-600 dark:text-amber-500 font-bold tracking-[0.2em] uppercase text-xs mb-4 block italic">Visual Moments</span>
                <h1 class="text-5xl md:text-6xl font-black text-gray-900 dark:text-white leading-[1.1] tracking-tighter mb-6">
                    Galeri <span class="text-amber-500 font-serif italic font-normal lowercase tracking-normal">kebaikan alam.</span>
                </h1>
                {{-- Border-l disesuaikan warnanya buat dark mode --}}
                <p class="text-gray-500 dark:text-slate-400 text-lg font-medium border-l-2 border-amber-100 dark:border-amber-900/50 pl-6">
                    Dokumentasi perjalanan kami dalam menghadirkan kemurnian dari sarang lebah hingga ke meja makan Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($galleries as $item)
                {{-- Card Galeri: Update BG dan Shadow --}}
                <div class="group relative overflow-hidden rounded-[2.5rem] aspect-square bg-gray-100 dark:bg-slate-900 shadow-sm dark:shadow-none cursor-pointer gallery-item" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                     onclick="openFullImage('{{ $item->image }}')">
                    
                    <img src="{{ $item->image }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">

                    {{-- Overlay Hitam: Sudah bagus, cuma dikuatin dikit --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-10">
                        <span class="text-amber-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">{{ $item->category ?? 'Activity' }}</span>
                        <h3 class="text-white text-2xl font-bold leading-tight">{{ $item->title }}</h3>
                    </div>

                    {{-- Icon Zoom: Backdrop blur buat efek mewah --}}
                    <div class="absolute top-8 right-8 w-12 h-12 bg-white/10 dark:bg-black/20 backdrop-blur-md rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-all duration-500 scale-50 group-hover:scale-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="galleryModal" class="fixed inset-0 z-[999] hidden bg-black/95 backdrop-blur-sm flex items-center justify-center p-4 md:p-10">
                <button onclick="closeFullImage()" class="absolute top-5 right-5 text-white/50 hover:text-amber-500 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <img id="fullImage" src="" class="max-w-full max-h-full rounded-2xl shadow-2xl transform scale-95 transition-transform duration-300">
            </div>

            <div class="mt-20 flex justify-center">
                {{ $galleries->links() }}
            </div>
        </div>
    </section>

    <section class="pb-24 bg-white dark:bg-slate-950 transition-colors duration-500">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="bg-amber-50 dark:bg-slate-900 rounded-[3rem] p-12 text-center border border-transparent dark:border-slate-800">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Ingin melihat proses kami secara langsung?</h2>
                <p class="text-gray-600 dark:text-slate-400 mb-8 max-w-xl mx-auto">Ikuti media sosial kami untuk update harian dari peternakan lebah Honey Mood.</p>
                
                <div class="flex justify-center gap-4">
                    @foreach($sosmeds as $sosmed)
                        <a href="{{ $sosmed->url }}" class="w-12 h-12 bg-white dark:bg-slate-800 rounded-2xl flex items-center justify-center text-gray-900 dark:text-white shadow-sm hover:bg-amber-500 dark:hover:bg-amber-500 hover:text-white transition-all">
                            <img src="{{ asset('storage/' . $sosmed->icon) }}" alt="{{ $sosmed->name }}" class="w-6 h-6 dark:invert">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.layout>


<script>
    const modal = document.getElementById('galleryModal');
    const modalImg = document.getElementById('fullImage');

    function openFullImage(src) {
        // Tampilkan modal
        modal.classList.remove('hidden');
        // Masukkan sumber gambar
        modalImg.src = src;
        // Animasi sedikit biar smooth
        setTimeout(() => {
            modalImg.classList.remove('scale-95');
            modalImg.classList.add('scale-100');
        }, 10);
        // Kunci scroll body biar gak bisa scroll pas modal buka
        document.body.style.overflow = 'hidden';
    }

    function closeFullImage() {
        modalImg.classList.add('scale-95');
        modalImg.classList.remove('scale-100');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 200);
        // Balikin scroll body
        document.body.style.overflow = 'auto';
    }

    // Tutup modal kalau user klik di area hitam (overlay)
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeFullImage();
        }
    });
</script>