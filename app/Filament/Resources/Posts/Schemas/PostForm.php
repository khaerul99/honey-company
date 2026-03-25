<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Forms\Components\Placeholder;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

use Filament\Schemas\Components\Section;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tulis Artikel')->schema([
                    TextInput::make('title')
                        ->label('Judul Artikel')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, ?string $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state ?? '')) : null),
                    
                    TextInput::make('author')
                        ->label('Author')
                        ->maxLength(255),

                    TextInput::make('slug')
                        ->label('URL Slug')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull()
                        ->unique('posts', 'slug', ignoreRecord: true),

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
                                                alt='Foto Artikel'>
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
                        ->label('Gambar Cover (Thumbnail)')
                        ->image()
                        ->disk('cloudinary')
                        ->directory('posts') 
                        ->visibility('cloudinary')
                        ->maxSize(5012)
                        ->columnSpanFull(),

                    RichEditor::make('content')
                        ->label('Isi Artikel')
                        ->required()
                        ->columnSpanFull(),

                    Toggle::make('is_published')
                        ->label('Terbitkan Artikel?')
                        ->default(true),
                ])->columns(2),
            ]);
    }
}
