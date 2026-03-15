<?php

namespace App\Filament\Resources\HeroSlides\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

use Filament\Tables\Table;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class HeroSlidesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar Slide')
                    ->disk('cloudinary')
                    ->visibility('cloudinary'),
                TextColumn::make('title')
                    ->label('Judul Slide')
                    ->searchable(),
                TextColumn::make('subtitle')
                    ->label('Subjudul Slide')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(30) 
                    ->tooltip(fn ($record): string => $record->description ?? '') 
                    ->color('gray'),
                ToggleColumn::make('is_active')
                    ->label('Status Aktif'),
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
