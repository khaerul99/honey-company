<?php

namespace App\Filament\Resources\Testimonies\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

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
                    FileUpload::make('photo')
                        ->image()
                        ->disk('cloudinary')
                        ->acceptedFileTypes(['image/*'])
                        ->directory('testimonies')
                        ->visibility('cloudinary')
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
