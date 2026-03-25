@props(['sosmeds'])
<div class="fixed bottom-10 right-10 z-50 group">
    <div class="flex flex-col gap-3 mb-4 transition-all duration-300 transform translate-y-10 opacity-0 invisible group-hover:translate-y-0 group-hover:opacity-100 group-hover:visible">
        
        @foreach($sosmeds as $sosmed)
        <a href="{{ $sosmed->url }}" target="_blank" class="w-12 h-12 bg-white border border-amber-400 shadow-lg rounded-full flex items-center justify-center hover:scale-110 transition-transform group/item">
            {{-- Jika kamu simpan icon sebagai path gambar --}}
            @if($sosmed->icon)
                <img src="{{ $sosmed->icon }}" class="w-6 h-6 object-contain" alt="{{ $sosmed->platform_name }}">
            @else
                {{-- Fallback jika tidak ada gambar --}}
                <span class="text-[10px] text-amber-600 font-bold uppercase">{{ substr($sosmed->platform_name, 0, 2) }}</span>
            @endif
            
            <span class="absolute right-14 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover/item:opacity-100 transition-opacity whitespace-nowrap">
                {{ $sosmed->platform_name }}
            </span>
        </a>
        @endforeach

    </div>

    <button class="w-16 h-16 bg-amber-500 text-white rounded-full flex items-center justify-center shadow-2xl hover:bg-amber-600 transition-all transform active:scale-95 border-4 border-white">
        <i class="fas fa-share-alt text-2xl group-hover:hidden"></i>
    </button>
</div>

<script>
    const fabButton = document.querySelector('.group');
    fabButton.addEventListener('click', function() {
        this.classList.toggle('group-hover:opacity-100'); 
    });
</script>