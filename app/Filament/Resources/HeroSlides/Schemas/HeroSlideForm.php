<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

use Illuminate\Support\Facades\Storage;

use Filament\Schemas\Components\Section;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                section::make('Detail Hero Slide')
                    ->description('Gunakan ini untuk menampilkan slide di bagian hero pada halaman utama.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Slide')
                            ->maxLength(255),

                        TextInput::make('subtitle')
                            ->label('Subjudul Slide')
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label('Gambar Slide')
                            ->image()
                            ->disk('cloudinary')
                            ->acceptedFileTypes(['image/*'])
                            ->directory('hero-slides')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->dehydrateStateUsing(function ($state) {
                                if (!$state) return null;
                                if (str_starts_with($state, 'http')) return $state;
                                return Storage::disk('cloudinary')->url($state);
                            })
                            ->imageCropAspectRatio('16:9')
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(true),
                    ])->columns(2),
            ]);
    }
}
