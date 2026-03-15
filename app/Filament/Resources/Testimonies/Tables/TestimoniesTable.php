<?php

namespace App\Filament\Resources\Testimonies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\IconColumn;

class TestimoniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                
            ImageColumn::make('photo')
                ->circular(),
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
            TextColumn::make('rating')
                ->badge()
                ->color('warning'),
            IconColumn::make('is_published')
                ->boolean()
                ->label('Tampil'),
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
