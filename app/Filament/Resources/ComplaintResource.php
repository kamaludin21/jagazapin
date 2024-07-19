<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Complaint;
use App\Models\Discussion;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ComplaintResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ComplaintResource\RelationManagers;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Pengaduan';
    protected static ?string $modelLabel = 'Aduan';
    protected static ?string $navigationLabel = 'Aduan';
    protected static ?string $slug = 'aduan';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Wizard::make([
                    Step::make('Pelapor')
                        ->schema([
                            Group::make()
                                ->relationship('reporter')
                                ->schema([
                                    Select::make('reporter_category_id')
                                        ->label('Kategori Pelapor')
                                        ->required()
                                        ->native(false)
                                        ->relationship('reporterCategory', 'title'),
                                    TextInput::make('name')
                                        ->label('Nama')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('email')
                                        ->helperText('Boleh kosong')
                                        ->label('Email')
                                        ->maxLength(255),
                                    TextInput::make('phone_number')
                                        ->helperText('Boleh kosong')
                                        ->label('No. Hp/Telpon')
                                        ->maxLength(255),
                                    Textarea::make('address')
                                        ->helperText('Boleh kosong')
                                        ->label('Alamat')
                                        ->autosize()
                                        ->maxLength(1024),
                                ]),
                        ]),
                    Step::make('Tersangka')
                        ->schema([
                            Group::make()
                                ->relationship('suspect')
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Nama')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('email')
                                        ->label('Email')
                                        ->helperText('Boleh kosong')
                                        ->maxLength(255),
                                    TextInput::make('phone_number')
                                        ->label('No. Hp/Telpon')
                                        ->helperText('Boleh kosong')
                                        ->maxLength(255),
                                    Textarea::make('address')
                                        ->label('Alamat')
                                        ->helperText('Boleh kosong')
                                        ->autosize()
                                        ->maxLength(1024),
                                ]),
                        ]),
                    Step::make('Aduan')
                        ->columns(3)
                        ->schema([
                            Grid::make()
                                ->columnSpan(2)
                                ->schema([
                                    Section::make()
                                        ->schema([
                                            Select::make('complaint_category_id')
                                                ->label('Kategori')
                                                ->native(false)
                                                ->relationship('complaintCategory', 'title')
                                                ->required(),
                                            Textarea::make('title')
                                                ->label('Judul ')
                                                ->required()
                                                ->autosize(),
                                            Textarea::make('description')
                                                ->label('deskripsi')
                                                ->required()
                                                ->autosize(),
                                            DateTimePicker::make('date')
                                                ->label('Tanggal Perkara')
                                                ->default(now())
                                                ->required(),
                                            TextInput::make('location')
                                                ->label('Tempat Perkara')
                                                ->helperText('Boleh kosong')
                                                ->maxLength(255),
                                        ]),
                                ]),

                            Grid::make()
                                ->columnSpan(1)
                                ->schema([
                                    Section::make()
                                        ->schema([
                                            FileUpload::make('attachment')
                                                ->label('Lampiran Bukti')
                                                ->directory('attachment/' . date('Y/m'))
                                                ->image()
                                                ->multiple()
                                                ->maxFiles(10)
                                                ->reorderable()
                                                ->columnSpanFull()
                                                ->helperText('Ukuran maksimal: 1 MB.  Jumlah maksimal: 10 File.'),
                                        ]),
                                ]),
                        ]),
                ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(isFromZero: false),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('date')
                    ->label('Tanggal Kejadian')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('complaintCategory.title')
                    ->label('Kategori')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->label('Dihapus')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ReplicateAction::make()
                    ->label('Diskusikan')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->hidden(
                        function (Model $record) {
                            $discussion = Discussion::where('id', $record->id)->first();
                            if ($discussion) :
                                if ($record->id === $discussion->id) :
                                    return true;
                                else :
                                    return false;
                                endif;
                            endif;
                        }
                    )
                    ->action(function (Tables\Actions\ReplicateAction $action, Model $record) {
                        Discussion::create([
                            'user_id' => auth()->user()->id,
                            'complaint_category_id' => $record->complaint_category_id,
                            'token' => $record->token,
                            'title' => $record->title,
                            'description' => $record->description,
                            'date' => $record->date,
                            'location' => $record->location,
                            'attachment' => $record->attachment,
                            'is_show' => $record->is_show,
                        ]);
                        Notification::make()
                            ->success()
                            ->title('Telah dijadikan bahan diskusi')
                            ->body('Lihat Topik ini pada menu diskusi.')
                            ->send();
                        $action->cancel();
                    }),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->color('secondary'),
                    Tables\Actions\EditAction::make()->color('success'),
                    Tables\Actions\DeleteAction::make()->color('danger'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComplaints::route('/'),
            'create' => Pages\CreateComplaint::route('/create'),
            'view' => Pages\ViewComplaint::route('/{record}'),
            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
