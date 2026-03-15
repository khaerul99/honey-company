<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Produk', \App\Models\Product::count())
            ->description('Madu yang terdaftar')
            ->descriptionIcon('heroicon-m-shopping-bag')
            ->chart([7, 2, 10, 3, 15, 4, 17]) // Ini buat garis grafik kecil
            ->color('primary'),
            
        Stat::make('Artikel Blog', \App\Models\Post::count())
            ->description('Tulisan yang dipublish')
            ->descriptionIcon('heroicon-m-document-text')
            ->chart([15, 4, 10, 2, 12, 4, 11])
            ->color('success'),
            
        Stat::make('Testimoni', \App\Models\Testimony::count())
            ->description('Review dari pembeli')
            ->descriptionIcon('heroicon-m-chat-bubble-left-right')
            ->chart([1, 3, 5, 10, 20, 40])
            ->color('warning'),
        ];
    }
}
