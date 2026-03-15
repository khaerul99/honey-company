<?php

namespace App\Filament\Resources\SocialMedia\Tables;


use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class SocialMediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')
                    ->label('Icon')
                    ->square()
                    ->size(40),

                TextColumn::make('platform_name')
                    ->label('Platform')
                    ->searchable(),

                TextColumn::make('url')
                    ->label('Link URL')
                    ->limit(30)
                    ->copyable() // Bisa di-copy langsung dari tabel
                    ->tooltip('Klik untuk menyalin link'),

                ToggleColumn::make('is_active')
                    ->label('Status Tampil'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
