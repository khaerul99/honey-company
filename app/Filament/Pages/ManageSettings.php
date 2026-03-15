<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

use Illuminate\Support\Facades\Storage;

use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;

use Filament\Schemas\Components\Section;

class ManageSettings extends Page implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected string $view = 'filament.pages.manage-settings';
    public ?array $data = [];

    public static function getNavigationIcon(): string { return 'heroicon-o-cog-6-tooth'; }
    public static function getNavigationGroup(): ?string { return 'Pengaturan Website'; }
    public static function getNavigationLabel(): string { return 'Pengaturan Umum'; }

    public function mount(): void
    {
        $setting = Setting::find(1); 

        if ($setting) {
            $this->form->fill($setting->toArray());
        }
    }

    public function form($form)
    {
        return $form
            ->schema([
                Section::make('Identitas Brand')
                    ->schema([
                        FileUpload::make('logo')->image()->disk('cloudinary')->directory('settings')->formatStateUsing(function ($state) {
                            return $state; 
                            })->dehydrateStateUsing(function ($state) {
                            if (!$state) return null;
                            if (str_starts_with($state, 'http')) return $state;
                            return Storage::disk('cloudinary')->url($state);
                        }),
                        TextInput::make('site_name')->label('Nama Website')->required(),
                    ])->columns(2),
                Section::make('Search Engine Optimization (SEO)')
                        ->description('Pengaturan agar website mudah ditemukan di Google')
                        ->schema([
                            TextInput::make('seo_title')
                                ->label('Meta Title')
                                ->placeholder('Contoh: Honey Lebah - Madu Murni 100% Asli Alam')
                                ->columnSpanFull(),
                            Textarea::make('seo_description')
                                ->label('Meta Description')
                                ->placeholder('Jelaskan singkat tentang toko kamu...')
                                ->rows(3)
                                ->columnSpanFull(),
                            TextInput::make('seo_keywords')
                                ->label('Keywords (Pisahkan dengan koma)')
                                ->placeholder('madu asli, madu murni, honey lebah, herbal')
                                ->columnSpanFull(),
                        ])->collapsed(),

                Section::make('Informasi Kontak')
                    ->schema([
                        TextInput::make('whatsapp')->label('Nomor WhatsApp')->required(),
                        TextInput::make('email')->label('Email Resmi')->required(),
                        TextInput::make('address')->label('Alamat Kantor/Toko')->columnSpanFull()->required(),
                    ])->columns(2),

                Section::make('Tentang Kami')
                    ->schema([
                        FileUpload::make('about_us_image')->image()->disk('cloudinary')->directory('settings')->dehydrateStateUsing(function ($state) {
                            if (!$state) return null;
                            if (str_starts_with($state, 'http')) return $state;
                            return Storage::disk('cloudinary')->url($state);
                        }),
                        RichEditor::make('about_us')->columnSpanFull()->label('Deskripsi Tentang Kami'),
                    ]),

            ])
            ->statePath('data');
    }

    
    public function save(): void
    {
        $state = $this->form->getState();
        
        Setting::updateOrCreate(['id' => 1], $state);

        Notification::make()
            ->title('Pengaturan berhasil diperbarui!')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Perubahan')
                ->action('save')
                ->color('primary'),
        ];
    }
}