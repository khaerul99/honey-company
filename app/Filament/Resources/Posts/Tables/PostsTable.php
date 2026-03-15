<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Cover')
                    ->square()
                    ->size(60),

                TextColumn::make('title')
                    ->label('Judul Artikel')
                    ->searchable()
                    ->limit(50), 

                TextColumn::make('author')
                    ->label('Author')
                    ->searchable(),

                TextColumn::make('content')
                    ->label('Isi Artikel')
                    ->formatStateUsing(fn (string $state): string => strip_tags($state))
                    ->limit(50)
                    ->searchable()
                    ->limit(50), 

                ToggleColumn::make('is_published')
                    ->label('Status Terbit'),

                TextColumn::make('created_at')
                    ->label('Tanggal Tulis')
                    ->dateTime('d M Y')
                    ->sortable(),
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
