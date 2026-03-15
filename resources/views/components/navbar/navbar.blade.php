@props(['setting'])

{{-- NAVBAR DESKTOP --}}
<nav class="hidden md:flex sticky top-0 z-50 w-full bg-white/80 dark:bg-slate-950/80 backdrop-blur-md items-center justify-between py-6 px-10 max-w-7xl mx-auto border-b border-slate-100 dark:border-slate-800 transition-colors duration-500">
    <div class="flex items-center gap-3">
        @if($setting?->logo)
            <img src="{{ $setting->logo }}" alt="Logo" class="h-10 w-auto">
        @endif
        <span class="text-2xl font-bold tracking-tighter text-slate-900 dark:text-white">
            {{ $setting?->site_name ?? 'Honey' }}
        </span>
    </div>
    
    <div class="flex items-center gap-8 font-medium text-slate-600 dark:text-slate-400">
        <a href="/" class="hover:text-amber-600 dark:hover:text-amber-500 transition">Home</a>
        <a href="/products" class="hover:text-amber-600 dark:hover:text-amber-500 transition">Produk</a>
        <a href="/gallery" class="hover:text-amber-600 dark:hover:text-amber-500 transition">Galeri</a>
        <a href="/blog" class="hover:text-amber-600 dark:hover:text-amber-500 transition">Blog</a>
        <a href="/about" class="hover:text-amber-600 dark:hover:text-amber-500 transition">Tentang Kami</a>
    </div>

    <div>
        @auth
            <a href="{{ url('/admin') }}" class="px-5 py-2 bg-slate-900 dark:bg-amber-500 text-white dark:text-slate-900 rounded-full text-sm font-semibold hover:bg-slate-800 dark:hover:bg-amber-400 transition">Dashboard</a>
        @else
            <a href="{{ url('/admin/login') }}" class="font-semibold text-slate-900 dark:text-white hover:text-amber-600 dark:hover:text-amber-500 transition">Log in</a>
        @endauth
    </div>
</nav>

{{-- NAVBAR MOBILE (Bottom Navigation) --}}
<nav class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/95 dark:bg-slate-900/95 backdrop-blur-xl border-t border-slate-100 dark:border-slate-800 px-4 py-3 shadow-[0_-10px_25px_rgba(0,0,0,0.05)] dark:shadow-[0_-10px_25px_rgba(0,0,0,0.2)] transition-colors duration-500">
    <div class="flex items-center justify-between">
        <a href="/" class="flex flex-col items-center gap-1 {{ request()->is('/') ? 'text-amber-600' : 'text-slate-400 dark:text-slate-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="text-[9px] font-black uppercase tracking-tighter">Home</span>
        </a>

        <a href="{{ route('products.index') }}" class="flex flex-col items-center gap-1 {{ request()->is('products*') ? 'text-amber-600' : 'text-slate-400 dark:text-slate-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">Produk</span>
        </a>

        <a href="/gallery" class="flex flex-col items-center gap-1 {{ request()->is('gallery*') ? 'text-amber-600' : 'text-slate-400 dark:text-slate-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">Galeri</span>
        </a>

        <a href="{{ route('blog.index') }}" class="flex flex-col items-center gap-1 {{ request()->is('blog*') ? 'text-amber-600' : 'text-slate-400 dark:text-slate-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">Blog</span>
        </a>

        <a href="/about" class="flex flex-col items-center gap-1 {{ request()->is('about*') ? 'text-amber-600' : 'text-slate-400 dark:text-slate-500' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">Tentang</span>
        </a>

        <a href="{{ url('/admin') }}" class="flex flex-col items-center gap-1 text-slate-400 dark:text-slate-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">{{ Auth::check() ? 'Admin' : 'Login' }}</span>
        </a>
    </div>
</nav>