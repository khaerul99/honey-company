@props(['setting'])

<footer class="bg-white dark:bg-slate-950 border-t border-gray-100 dark:border-slate-800 pt-16 pb-8 transition-colors duration-500">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16 ">
            
            <div class="space-y-6">
                @if($setting?->logo)
                    <img src="{{ $setting->logo }}" alt="Logo" class="h-12">
                @else
                    <span class="text-2xl font-bold text-amber-600 dark:text-amber-500">{{ $setting?->site_name ?? 'Honey Mood' }}</span>
                @endif
                <p class="text-gray-500 dark:text-slate-400 leading-relaxed">
                    Menyediakan madu murni berkualitas tinggi langsung dari alam untuk kesehatan keluarga Anda.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-amber-50 dark:bg-amber-900/20 flex items-center justify-center text-amber-600 dark:text-amber-500 hover:bg-amber-600 hover:text-white dark:hover:bg-amber-500 dark:hover:text-slate-900 transition-all">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-amber-50 dark:bg-amber-900/20 flex items-center justify-center text-amber-600 dark:text-amber-500 hover:bg-amber-600 hover:text-white dark:hover:bg-amber-500 dark:hover:text-slate-900 transition-all">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Navigasi</h4>
                <ul class="space-y-4 text-gray-500 dark:text-slate-400">
                    <li><a href="#" class="hover:text-amber-600 dark:hover:text-amber-500 transition-colors">Beranda</a></li>
                    <li><a href="#about" class="hover:text-amber-600 dark:hover:text-amber-500 transition-colors">Tentang Kami</a></li>
                    <li><a href="#products" class="hover:text-amber-600 dark:hover:text-amber-500 transition-colors">Produk Kami</a></li>
                    <li><a href="#testimony" class="hover:text-amber-600 dark:hover:text-amber-500 transition-colors">Testimoni</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Hubungi Kami</h4>
                <ul class="space-y-4 text-gray-500 dark:text-slate-400">
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ $setting?->address ?? 'Alamat belum diatur' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ $setting?->email ?? 'email@anda.com' }}</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Beli Sekarang</h4>
                <p class="text-gray-500 dark:text-slate-400 mb-4 text-sm">Punya pertanyaan? Chat kami langsung lewat WhatsApp.</p>
                <a href="https://wa.me/{{ $setting?->whatsapp }}" target="_blank" class="inline-flex items-center justify-center w-full py-3 px-6 bg-green-500 dark:bg-green-600 text-white rounded-xl font-bold hover:bg-green-600 dark:hover:bg-green-500 transition-colors shadow-lg shadow-green-200 dark:shadow-none">
                    <i class="fab fa-whatsapp mr-2 text-xl"></i>
                    Chat WhatsApp
                </a>
            </div>

        </div>

        <div class="border-t border-gray-100 dark:border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-400 dark:text-slate-500 text-sm">
                &copy; {{ date('Y') }} {{ $setting?->site_name ?? 'Honey Mood' }}. All rights reserved.
            </p>
            <p class="text-gray-400 dark:text-slate-500 text-sm">
                Designed with ❤️ by <span class="text-amber-600 dark:text-amber-500 font-medium">Khaerul Rijal</span>
            </p>
        </div>
    </div>
</footer>