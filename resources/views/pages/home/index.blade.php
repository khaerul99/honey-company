<x-layouts.layout :setting="$setting" :sosmeds="$sosmeds"> 
        <x-hero.hero :heros="$heros" />
        
        <x-features.features />

        <x-aboutus.aboutus :setting="$setting" />

        <x-card.product-card :products="$products" />

        <x-info-section :contents="$contents" />

        <x-faqs.faqs :faqs="$faqs" />

        <x-blog.blog 
            :blogs="$latestBlogs" 
            title="Jurnal <span class='text-amber-500'>Madu Murni</span>" 
            subtitle="Edukasi seputar manfaat madu untuk kesehatan dan gaya hidup sehat Anda."
            class="bg-gray-50/50" 
        />

        <x-testimonies.testimonies :testimonies="$testimonies" />

        <x-cta.cta :setting="$setting" />

</x-layouts.layout>

    
        