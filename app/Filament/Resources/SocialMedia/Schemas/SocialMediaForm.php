<?php

namespace App\Filament\Resources\SocialMedia\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;

use Filament\Schemas\Components\Section;

// use CodeWithPolas\FilamentCloudinary\Forms\Components\CloudinaryFileUpload;

class SocialMediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Info Sosial Media')->schema([
                    TextInput::make('platform_name')
                        ->label('Nama Platform (misal: Instagram)')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('url')
                        ->label('Link Profil (URL)')
                        ->required()
                        ->url() 
                        ->maxLength(255),
                    
                    Placeholder::make('current_photo')
                            ->label('Foto Saat Ini')
                            ->content(fn ($record) => $record?->icon 
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
                                            <img src='{$record->icon}' 
                                                style='width: 100%; height: 100%; object-fit: cover;' 
                                                alt='Foto sosial media'>
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

                    FileUpload::make('icon')
                        ->label('Upload Icon / Logo')
                        ->image()
                        ->disk('cloudinary')
                        ->acceptedFileTypes(['image/*'])
                        ->directory('social_media')
                        ->visibility('cloudinary')
                        ->formatStateUsing(fn ($state) => $state)
                        ->moveFiles() 
                        ->preserveFilenames()
                        ->nullable(),

                    Toggle::make('is_active')
                        ->label('Tampilkan di Website?')
                        ->default(true),
                ])->columns(1),
            ]);
    }
}
