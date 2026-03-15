@props(['faqs'])

<section class="py-24 bg-white dark:bg-slate-950 w-full max-w-7xl mx-auto px-6 transition-colors duration-500">
    <div class="container mx-auto px-6">
        <div class="max-w-2xl mx-auto text-center mb-20">
            <span class="text-amber-600 dark:text-amber-500 font-semibold tracking-widest uppercase text-sm italic">F.A.Q</span>
            <h2 class="text-4xl font-bold text-gray-900 dark:text-white mt-3 mb-4">Pertanyaan Populer</h2>
            <p class="text-gray-500 dark:text-slate-400 text-lg">Semua yang perlu Anda ketahui tentang produk dan layanan Honey Mood.</p>
        </div>

        <div class="max-w-3xl mx-auto">
            @foreach($faqs as $faq)
           
            <div class="faq-item group border-b border-gray-100 dark:border-slate-800 last:border-0">
                <button class="faq-button w-full py-7 text-left flex justify-between items-center transition-all duration-300 focus:outline-none">
                  
                    <span class="text-xl font-medium text-gray-700 dark:text-slate-200 group-hover:text-amber-600 dark:group-hover:text-amber-500 transition-colors">
                        {{ $faq->question }}
                    </span>
                    <div class="faq-icon-container relative w-6 h-6 flex items-center justify-center">
                       
                        <div class="absolute w-full h-0.5 bg-gray-300 dark:bg-slate-600 rounded-full transition-all duration-300"></div>
                        <div class="faq-line-v absolute h-full w-0.5 bg-gray-300 dark:bg-slate-600 rounded-full transition-all duration-300"></div>
                    </div>
                </button>

                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    
                    <div class="pb-8 text-gray-500 dark:text-slate-400 text-lg leading-relaxed">
                        {{ $faq->answer }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.faq-button').forEach(button => {
        button.addEventListener('click', () => {
            const item = button.parentElement;
            const answer = item.querySelector('.faq-answer');
            const lineV = item.querySelector('.faq-line-v');
            const text = item.querySelector('span');

            const isActive = item.classList.contains('active');

         
            document.querySelectorAll('.faq-item').forEach(otherItem => {
                otherItem.classList.remove('active');
                otherItem.querySelector('.faq-answer').style.maxHeight = null;
                
                otherItem.querySelector('.faq-line-v').style.transform = 'rotate(0deg)';
                const otherSpan = otherItem.querySelector('span');
                otherSpan.classList.remove('text-amber-600', 'dark:text-amber-500');
            });

            if (!isActive) {
                item.classList.add('active');
                answer.style.maxHeight = answer.scrollHeight + "px";
                lineV.style.transform = 'rotate(90deg)';
                text.classList.add('text-amber-600', 'dark:text-amber-500');
            }
        });
    });
</script>