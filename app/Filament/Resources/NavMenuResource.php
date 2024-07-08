<?php

namespace App\Filament\Resources;

use App\Models\Link;
use App\Models\Page;
use Filament\Tables;
use App\Models\Article;
use App\Models\NavMenu;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\FileCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MorphToSelect;
use App\Filament\Resources\NavMenuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NavMenuResource extends Resource
{
    protected static ?string $model = NavMenu::class;
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $modelLabel = 'Nav Menu';
    protected static ?string $navigationLabel = 'Nav Menu';
    protected static ?string $slug = 'nav-menu';
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Hidden::make('user_id')
                    ->required()
                    ->default(auth()->user()->id)
                    ->disabled()
                    ->dehydrated(),
                Hidden::make('parent_id')
                    ->required()
                    ->default(-1)
                    ->disabled()
                    ->dehydrated(),
                Hidden::make('order')
                    ->required()
                    ->default(0)
                    ->disabled()
                    ->dehydrated(),
                Section::make()
                    ->schema([
                        Toggle::make('is_show')
                            ->label('Status')
                            ->required()
                            ->default(true),
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(50)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->helperText('Jumlah karakter maksimal: 50.'),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Slug akan otomatis dihasilkan dari judul.'),
                    ]),
                MorphToSelect::make('modelable')
                    ->label('Arahkan Ke')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->types([
                        MorphToSelect\Type::make(Article::class)
                            ->titleAttribute('title')
                            ->label('Artikel'),
                        MorphToSelect\Type::make(Page::class)
                            ->titleAttribute('title')
                            ->label('Halaman'),
                        MorphToSelect\Type::make(Category::class)
                            ->titleAttribute('title')
                            ->label('Kategori'),
                        MorphToSelect\Type::make(Link::class)
                            ->titleAttribute('title')
                            ->label('Link'),
                        MorphToSelect\Type::make(FileCategory::class)
                            ->titleAttribute('title')
                            ->label('Kategori Dokumen'),
                    ])
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
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('modelable_type')
                    ->label('Model Type')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('modelable_id')
                    ->label('Model Id')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label('Penulis')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                ToggleColumn::make('is_show')
                    ->label('Status')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->color('secondary'),
                    Tables\Actions\EditAction::make()->color('success'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNavMenus::route('/'),
            'create' => Pages\CreateNavMenu::route('/create'),
            'view' => Pages\ViewNavMenu::route('/{record}'),
            'edit' => Pages\EditNavMenu::route('/{record}/edit'),
            'tree-list' => Pages\NavMenuTree::route('/tree-list'),
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
