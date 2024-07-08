<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Discussion;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DiscussionResource\Pages;
use App\Filament\Resources\DiscussionResource\RelationManagers;
use Filament\Forms\Components\Group;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;

class DiscussionResource extends Resource
{
    protected static ?string $model = Discussion::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Pengaduan';
    protected static ?string $modelLabel = 'Diskusi';
    protected static ?string $navigationLabel = 'Diskusi';
    protected static ?string $slug = 'diskusi';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    // ->columnSpan(2)
                    ->schema([
                        Section::make()
                            ->columns(2)
                            ->schema([
                                Group::make()
                                    ->relationship('reporter')
                                    ->schema([
                                        Select::make('reporter_category_id')
                                            ->label('Kategori Pelapor')
                                            ->disabled()
                                            ->relationship('reporterCategory', 'title'),
                                        TextInput::make('name')
                                            ->label('Nama')
                                            ->disabled(),
                                        TextInput::make('email')
                                            ->label('Email')
                                            ->disabled(),
                                        TextInput::make('phone_number')
                                            ->label('No. Hp/Telpon')
                                            ->disabled(),
                                        Textarea::make('address')
                                            ->label('Alamat')
                                            ->autosize()
                                            ->disabled(),
                                    ]),
                                Group::make()
                                    ->relationship('suspect')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Nama')
                                            ->disabled(),
                                        TextInput::make('email')
                                            ->label('Email')
                                            ->disabled(),
                                        TextInput::make('phone_number')
                                            ->label('No. Hp/Telpon')
                                            ->disabled(),
                                        Textarea::make('address')
                                            ->label('Alamat')
                                            ->autosize()
                                            ->disabled(),
                                    ]),
                            ]),


                    ]),
                Grid::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make()
                            ->schema([
                                Select::make('complaint_category_id')
                                    ->label('Kategori')
                                    ->relationship('complaintCategory', 'title')
                                    ->disabled(),
                                Textarea::make('title')
                                    ->label('Judul ')
                                    ->autosize()
                                    ->disabled(),
                                Textarea::make('description')
                                    ->label('deskripsi')
                                    ->disabled()
                                    ->autosize(),
                                DateTimePicker::make('date')
                                    ->label('Tanggal Perkara')
                                    ->disabled(),
                                TextInput::make('location')
                                    ->label('Tempat Perkara')
                                    ->disabled(),
                            ]),
                        Section::make()
                            ->schema([
                                FileUpload::make('attachment')
                                    ->label('Lampiran Bukti')
                                    ->directory('attachment/' . date('Y/m'))
                                    ->image()
                                    ->openable()
                                    ->multiple()
                                    ->columnSpanFull()
                                    ->disabled(),
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
                TextColumn::make('forward.nama')
                    ->label('Diskusi Diteruskan ke:')
                    // ->default(fn(): string => 'Diskusi belum di terukan')
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->color('secondary'),
                    Tables\Actions\EditAction::make()->color('success'),
                    Tables\Actions\Action::make('forward')
                        ->label('Forward')
                        ->color('primary')
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Select::make('forward_id')
                                ->label('Diteruskan')
                                ->relationship(name: 'forward', titleAttribute: 'nama')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('nama')
                                        ->required()
                                ])
                                ->required()
                                ->searchable()
                                ->preload(),
                        ])
                        ->action(function(array $data, Model $record){
                            $record->update([
                                'forward_id' => $data['forward_id']
                            ]);

                            Notification::make()
                            ->success()
                            ->title('Diskusi diteruskan')
                             ->body('Diskusi dengan judul : '. $record->title .'sukses diterukan ke :' . $record->forward->nama)
                            ->send();
                        })
                        ->icon('heroicon-m-forward'),
                    Tables\Actions\DeleteAction::make()->color('danger'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DiscussionResponseRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscussions::route('/'),
            'create' => Pages\CreateDiscussion::route('/create'),
            // 'view' => Pages\ViewDiscussion::route('/{record}'),
            'edit' => Pages\EditDiscussion::route('/{record}/edit'),
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
