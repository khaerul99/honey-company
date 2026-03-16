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
                            ? new HtmlString("<img src='{$record->photo}' class='w-32 h-32 rounded-xl shadow-md object-cover'>")
                            : 'Belum ada foto'
                        )
                        ->visible(fn ($record) => $record !== null),
                    FileUpload::make('photo')
                        ->image()
                        ->acceptedFileTypes(['image/*'])
                        ->directory('testimonies')
                        ->visibility('cloudinary')
                        ->formatStateUsing(fn ($state) => $state)
                        ->dehydrateStateUsing(function ($state) {
                            if (!$state) return null;
                            if (str_starts_with($state, 'http')) return $state;
                            return Storage::disk('cloudinary')->url($state);
                        }),
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
