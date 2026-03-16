<?php

namespace App\Filament\Resources\Contents\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

use Filament\Schemas\Components\Section;

class ContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Konten')
                    ->description('Gunakan ini untuk Banner, Slider, atau Informasi Tambahan.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Konten')
                            ->maxLength(255),

                        Placeholder::make('current_photo')
                            ->label('Foto Saat Ini')
                            ->content(fn ($record) => $record?->image 
                                ? new HtmlString("
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
                                            <img src='{$record->image}' 
                                                style='width: 100%; height: 100%; object-fit: cover;' 
                                                alt='Foto Galeri'>
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

                        FileUpload::make('image')
                            ->label('Gambar Konten')
                            ->image()
                            ->disk('cloudinary')
                            ->acceptedFileTypes(['image/*'])
                            ->directory('contents')
                            ->visibility('cloudinary')
                            ->formatStateUsing(fn ($state) => $state)
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
