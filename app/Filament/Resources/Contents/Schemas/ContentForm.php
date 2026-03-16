<?php

namespace App\Filament\Resources\Contents\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Illuminate\Support\Facades\Storage;

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
