<?php

namespace App\Filament\Resources\Contents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class ContentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort_order') 
            ->defaultSort('sort_order')
            ->columns([
                //
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->placeholder('Tanpa Judul'),
                
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(30) 
                    ->tooltip(fn ($record): string => $record->description ?? '') 
                    ->color('gray'),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                
                ToggleColumn::make('is_active')
                    ->label('Aktif'),
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
