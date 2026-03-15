<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;

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

                    FileUpload::make('image')
                        ->label('Gambar Cover (Thumbnail)')
                        ->image()
                        ->disk('cloudinary')
                        ->directory('posts') 
                        ->visibility('cloudinary')
                        ->maxSize(2048)
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
