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

use Illuminate\Support\Facades\Storage;

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