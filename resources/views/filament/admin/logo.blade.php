<div style='display: flex; align-items: center; gap: 0.75rem;'>
    @php
        $setting = \App\Models\Setting::first();
    @endphp

    @if($setting?->logo)
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" style="height: 40px; width: auto;" class="rounded">
    @endif

    <div class="flex flex-col line-height-1">
        <span class="text-lg font-bold tracking-tight text-gray-950 dark:text-white leading-none">
            {{ $setting?->site_name ?? 'Honey Lebah' }}
        </span>
    </div>
</div>