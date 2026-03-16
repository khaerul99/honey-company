<?php

namespace App\Filament\Resources\Testimonies\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

use Illuminate\Support\Facades\Storage;

use Filament\Schemas\Components\Section;
 

class TestimonyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pelanggan')->schema([
                    TextInput::make('name')
                        ->label('Nama Pelanggan')
                        ->required(),
                   Placeholder::make('current_photo')
                        ->label('Foto Saat Ini')
                        ->content(fn ($record) => $record?->photo 
                            ? new HtmlString("
                                <div class='relative group w-fit'>
                                    <div class='absolute -inset-1 bg-gradient-to-r from-amber-500 to-orange-600 rounded-[2rem] blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200'></div>
                                    <div class='relative bg-white dark:bg-slate-900 ring-1 ring-gray-900/5 rounded-[1.5rem] overflow-hidden shadow-xl'>
                                        <img src='{$record->photo}' 
                                            class='w-48 h-48 object-cover transform transition-transform duration-500 group-hover:scale-110' 
                                            alt='Foto Testimoni'>
                                    </div>
                                    <div class='mt-2 flex items-center gap-2 text-xs text-slate-400 italic'>
                                        <svg class='w-3 h-3 text-amber-500' fill='currentColor' viewBox='0 0 20 20'><path d='M10 12a2 2 0 100-4 2 2 0 000 4z'/><path fill-rule='evenodd' d='M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z' clip-rule='evenodd'/></svg>
                                        Preview Mode Aktif
                                    </div>
                                </div>
                            ")
                            : new HtmlString("
                                <div class='flex items-center p-4 border-2 border-dashed border-slate-200 rounded-2xl text-slate-400 italic text-sm'>
                                    <i class='fas fa-image-slash mr-2'></i> Belum ada foto testimoni
                                </div>
                            ")
                        )
                        ->visible(fn ($record) => $record !== null),
                    FileUpload::make('photo')
                        ->image()
                        ->disk('cloudinary')
                        ->acceptedFileTypes(['image/*'])
                        ->directory('testimonies')
                        ->visibility('cloudinary')
                        ->formatStateUsing(fn ($state) => $state)
                        ])->columns(1),

            Section::make('Isi Testimoni')->schema([
                    Select::make('rating')
                        ->options([
                            5 => '⭐⭐⭐⭐⭐ (Sangat Puas)',
                            4 => '⭐⭐⭐⭐ (Puas)',
                            3 => '⭐⭐⭐ (Cukup)',
                            2 => '⭐⭐ (Buruk)',
                            1 => '⭐ (Sangat Buruk)',
                        ])->default(5)->required(),
                   Textarea::make('content')
                        ->label('Komentar')
                        ->required(),
                    Toggle::make('is_published')
                        ->label('Tampilkan di Website')
                        ->default(true),
                ]),
            ]);
    }
}
