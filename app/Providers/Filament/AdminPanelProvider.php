<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\AvatarProviders\UiAvatarsProvider;
use Filament\Navigation\MenuItem;

use Filament\Forms\Components\FileUpload;

use Illuminate\Support\Facades\Storage;

use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;

use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $setting = \App\Models\Setting::find(1);

      

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->userMenuItems([
            'profile' => MenuItem::make()
                ->label(fn() => auth()->user()->name) 
                ->url(fn (): string => EditProfilePage::getUrl()) 
                ->icon('heroicon-m-user-circle'),
            ])
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
           ->plugins([
            FilamentEditProfilePlugin::make()
                ->slug('my-profile')
                ->shouldRegisterNavigation(false)
                ->shouldShowBrowserSessionsForm() 
                ->shouldShowAvatarForm() 
        ])
            ->favicon($setting && $setting->logo ? Storage::disk('cloudinary')->url($setting->logo) : asset('favicon.ico'))
            ->brandLogo(fn () => view('filament.admin.logo', ['setting' => $setting->logo ?? null]))
            ->brandName($setting?->site_name ?? 'Honey Lebah')
            ->brandLogoHeight('2.5rem')
            ->navigationGroups([
                'Manajemen Produk',
                'Manajemen Konten',
            ])
            ->defaultAvatarProvider(\Filament\AvatarProviders\UiAvatarsProvider::class)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // AccountWidget::class,
                // FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
            
    }
}
