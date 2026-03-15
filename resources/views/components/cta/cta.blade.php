@props(['setting'])

<div class="w-full py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-5xl font-extrabold text-slate-900 mt-6 tracking-tight">Siap Mencoba <span class="italic text-amber-500">Madu Kami?</span></h2>

                <div class="mt-32 relative group">
                    <div class="absolute inset-0 bg-amber-500 rounded-[3.5rem] rotate-1 group-hover:rotate-0 transition-transform duration-500"></div>
                        <div class="relative bg-slate-900 rounded-[3.5rem] p-10 lg:p-20 flex flex-col lg:flex-row items-center justify-between gap-12 overflow-hidden border border-white/10 shadow-2xl">
                
                            <div class="absolute -top-24 -right-24 w-64 h-64 bg-amber-500/20 rounded-full blur-[80px]"></div>

                            <div class="text-center lg:text-left relative z-10">
                                <h3 class="text-3xl lg:text-5xl font-black text-white mb-4 leading-tight">Madu Murni <br class="hidden lg:block"> Untuk Keluarga Anda</h3>
                                <p class="text-slate-400 text-lg font-light italic">Konsultasikan kebutuhan kesehatan Anda secara gratis.</p>
                            </div>

                                <div class="relative z-10">
                    <a href="https://wa.me/{{ $setting?->whatsapp }}" class="inline-flex items-center gap-4 bg-white hover:bg-amber-500 hover:text-white text-slate-900 font-black py-5 px-10 rounded-2xl transition-all duration-300 shadow-xl shadow-white/5 active:scale-95">
                        CHAT WHATSAPP
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.67-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.067 2.877 1.215 3.076.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
            </div>
        </div>
    </div>
</div>