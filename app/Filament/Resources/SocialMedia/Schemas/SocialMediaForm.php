<?php

namespace App\Filament\Resources\SocialMedia\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Filament\Schemas\Components\Section;

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

                    FileUpload::make('icon')
                        ->label('Upload Icon / Logo')
                        ->image()
                        ->disk('cloudinary')
                        ->acceptedFileTypes(['image/*'])
                        ->directory('social_media')
                        ->visibility('cloudinary')
                        ->preserveFilenames()
                        ->maxSize(1024) 
                        ->nullable(),

                    Toggle::make('is_active')
                        ->label('Tampilkan di Website?')
                        ->default(true),
                ])->columns(1),
            ]);
    }
}
