
@props(['testimonies'])
<section class="py-20 bg-amber-50/50 w-full dark:bg-slate-950/50 transition-colors duration-500">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">Apa Kata Mereka?</h2>
            <p class="text-gray-600 dark:text-slate-400 max-w-2xl mx-auto">Cerita manis dari pelanggan setia Honey Mood yang telah merasakan kemurnian madu asli kami.</p>
        </div>

        <div class="flex overflow-x-auto pb-8 gap-6 snap-x snap-mandatory hide-scrollbar">
            @foreach($testimonies as $item)
            <div class="min-w-[320px] md:min-w-[384px] snap-center bg-white dark:bg-slate-900 p-8 rounded-2xl shadow-sm border border-amber-100 dark:border-slate-800 hover:shadow-md dark:hover:shadow-amber-900/10 transition-all duration-300 relative">
                
                <div class="absolute top-6 right-8 opacity-10">
                    <svg class="w-12 h-12 text-amber-600 dark:text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V13.5C14.017 14.3284 13.3454 15 12.517 15H12.017V21H14.017ZM4.017 21H6.017V15H5.517C4.68858 15 4.017 14.3284 4.017 13.5V9C4.017 8.44772 4.46472 8 5.017 8H9.017C9.56928 8 10.017 8.44772 10.017 9V15C10.017 15.5523 9.56928 16 9.017 16H6.017C4.91243 16 4.017 16.8954 4.017 18V21H4.017Z" />
                    </svg>
                </div>

                <div class="flex mb-4 text-amber-400">
                    @for($i = 0; $i < $item->rating; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>

                <p class="text-gray-700 dark:text-slate-300 leading-relaxed mb-6 italic">
                    "{{ $item->content }}"
                </p>

                <div class="flex items-center gap-4">
                    @if($item->photo)
                        <img src="{{ $item->photo }}" alt="{{ $item->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-amber-200 dark:border-amber-900/50">
                    @else
                        <div class="w-12 h-12 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center text-amber-600 dark:text-amber-500 font-bold">
                            {{ substr($item->name, 0, 1) }}
                        </div>
                    @endif
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white leading-none mb-1">{{ $item->name }}</h4>
                        <span class="text-sm text-gray-500 dark:text-slate-500">{{ $item->job }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<style>
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>