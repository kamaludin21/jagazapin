<?php

namespace App\Filament\Resources\DiscussionResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DiscussionResponse;
use Filament\Forms\Components\Hidden;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Resources\RelationManagers\RelationManager;

class DiscussionResponseRelationManager extends RelationManager
{
    protected static string $relationship = 'discussionResponse';
    protected static ?string $title = 'Diskusi';

    public function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Hidden::make('user_id')
                    ->required()
                    ->default(auth()->user()->id)
                    ->disabled()
                    ->dehydrated(),
                Textarea::make('content')
                    ->label('Pesan')
                    ->required()
                    ->autosize()
                    ->maxLength(1024),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Diskusi')
            ->description('Diskusikan dengan anggota lain terkait topik diatas')
            ->recordTitleAttribute('content')
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->poll('3s')
            ->deferLoading()
            ->columns([
                TextColumn::make('content')
                    ->label('Pesan')
                    ->weight(FontWeight::Bold)
                    ->alignment(Alignment::Start)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Oleh')
                    ->icon('heroicon-o-user')
                    ->description(fn (DiscussionResponse $record): string => $record->created_at)
                    ->weight(FontWeight::Bold)
                    ->color('primary')
                    ->alignment(Alignment::End),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tanggapi')
                    ->icon('heroicon-o-chat-bubble-oval-left-ellipsis'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->color('secondary'),
                    Tables\Actions\EditAction::make()
                        ->color('success')
                        ->hidden(
                            function (Model $record) {
                                if ($record->user_id === auth()->user()->id) :
                                    return false;
                                else :
                                    return true;
                                endif;
                            }
                        ),
                    Tables\Actions\DeleteAction::make()
                        ->color('danger')
                        ->hidden(
                            function (Model $record) {
                                if ($record->user_id === auth()->user()->id) :
                                    return false;
                                else :
                                    return true;
                                endif;
                            }
                        ),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}
