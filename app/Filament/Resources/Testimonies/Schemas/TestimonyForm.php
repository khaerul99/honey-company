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
                            ? new \Illuminate\Support\HtmlString("
                                <div style='margin-bottom: 15px;'>
                                    <div style='
                                        width: 200px; 
                                        height: 250px; 
                                        border-radius: 24px; 
                                        overflow: hidden; 
                                        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
                                        border: 4px solid white;
                                        background-color: #f3f4f6;
                                    '>
                                        <img src='{$record->photo}' 
                                            style='width: 100%; height: 100%; object-fit: cover;' 
                                            alt='Foto Testimoni'>
                                    </div>
                                    <div style='
                                        margin-top: 8px; 
                                        font-size: 11px; 
                                        color: #94a3b8; 
                                        font-style: italic;
                                        display: flex;
                                        align-items: center;
                                        gap: 4px;
                                    '>
                                        <span style='color: #f59e0b;'>●</span> Preview Mode Aktif
                                    </div>
                                </div>
                            ")
                            : 'Belum ada foto'
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
