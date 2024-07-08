<?php

namespace App\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use App\Models\Site as IdentitasSite;
use Filament\Forms;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class Site extends Page implements HasForms
{
    use InteractsWithForms, WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.site';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Config System';

    protected static ?string $navigationLabel = 'Site';

    public $favicon, $logo, $nama_site, $hp, $medsos;

    public function mount(): void 
    {
        $model = IdentitasSite::first()->toArray();
        $this->form->fill($model);
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_site')
                    ->label('Nama Site')
                    ->required(),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->required()
                    ->multiple()
                    ->openable()
                    ->reorderable()
                    ->downloadable()
                    ->default('profile.jpeg')
                    ->directory('public/identitas_site')
                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg'])
                    ->image(),
                Forms\Components\FileUpload::make('favicon')
                    ->label('Favicon')
                    ->required()
                    ->openable()
                    ->downloadable()
                    ->disk('public')
                    ->default('profile.jpeg')
                    ->directory('public/identitas_site')
                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg'])
                    ->image(),
                Forms\Components\TextInput::make('hp')
                    ->label('Nomor HP')
                    ->placeholder('Masukkan nomor HP'),
                Forms\Components\Repeater::make('medsos')
                ->addActionLabel('Media Sosial')
                ->schema([
                    Forms\Components\FileUpload::make('icon')
                    ->label('Icon')
                    ->required()
                    ->openable()
                    ->downloadable()
                    ->disk('public')
                    ->default('profile.jpeg')
                    ->directory('public/identitas_site')
                    ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg'])
                    ->image(),
                    Forms\Components\TextInput::make('link')
                    ->required(),
                ])
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('simpan')
                ->label('Simpan')
                ->icon('heroicon-o-bookmark-square')
                ->submit('simpan'),
        ];
    }

    public function simpan()
    {
        try {
            $state = $this->form->getState();
            $model = IdentitasSite::first();
            $model->update($state);

        } catch (Halt $exception) {
            return;
        }

        Notification::make() 
            ->success()
            ->title('Berhasil disimpan!')
            ->send();
    }
}
