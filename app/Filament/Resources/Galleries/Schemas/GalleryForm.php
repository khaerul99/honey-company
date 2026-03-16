<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Illuminate\Support\Facades\Storage;

use Filament\Schemas\Components\Section;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Upload Foto Galeri')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul / Keterangan Foto')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('image')
                            ->label('File Foto')
                            ->image()
                            ->disk('cloudinary')
                            ->directory('galleries') 
                            ->visibility('cloudinary')
                            ->formatStateUsing(fn ($state) => $state)
                            ->maxSize(2048)
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Tampilkan di Website?')
                            ->default(true),
                    ])->columns(1),
            ]);
    }
}
