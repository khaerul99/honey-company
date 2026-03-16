<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
// 1. Ini komponen INPUT (Tetap di Forms)
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;


use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Placeholder;

use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Group::make()->schema([
                    Section::make('Informasi Utama')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nama Produk')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (string $operation, ?string $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state ?? '')) : null),

                            TextInput::make('slug')
                                ->label('URL Slug')
                                ->required()
                                ->maxLength(255)
                                ->unique(Product::class, 'slug', ignoreRecord: true),

                            Select::make('category_id')
                                ->label('Kategori')
                                ->relationship('category', 'name')
                                ->required()
                                ->searchable()
                                ->preload(),

                            RichEditor::make('description')
                                ->label('Deskripsi Produk')
                                ->columnSpanFull(),
                        ])
                        ->columns(2),
                ])->columnSpan(['lg' => 2]),

                Group::make()->schema([
                    Section::make('Harga & Gambar')
                        ->schema([
                            TextInput::make('price')
                                ->label('Harga (Rp)')
                                ->required()
                                ->numeric()
                                ->prefix('Rp'),

                            TextInput::make('weight')
                                ->label('Berat (misal: 500 gr)')
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
                                                alt='Foto Produk'>
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
                                ->label('Foto Produk')
                                ->image()
                                ->disk('cloudinary')
                                ->directory('products')
                                ->visibility('cloudinary')
                                ->formatStateUsing(fn ($state) => $state)
                                ->maxSize(2048)
                                ->columnSpanFull(),

                            Toggle::make('is_active')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                ])->columnSpan(['lg' => 1]),
            ]);
    }
}