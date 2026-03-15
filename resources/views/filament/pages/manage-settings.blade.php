<x-filament-panels::page>
    <form wire:submit.prevent="save">
        {{ $this->form }}
        
        <div class="mt-10" style='margin-top: 2.5rem; display: flex; justify-content: flex-end; gap: 1rem;'>
            <x-filament::button type="submit" size="lg">
                Simpan Perubahan
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>