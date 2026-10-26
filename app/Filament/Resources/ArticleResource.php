<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $modelLabel = 'Artikel Sains';

    protected static ?string $pluralModelLabel = 'Artikel Sains';

    protected static ?string $navigationGroup = 'Blog & Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Group::make([
                            Forms\Components\Section::make('Konten Artikel')
                                ->schema([
                                    Forms\Components\TextInput::make('title')
                                        ->label('Judul Artikel')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn ($state, Forms\Set $set, string $operation) => $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                        ),
                                    Forms\Components\TextInput::make('slug')
                                        ->required()
                                        ->maxLength(255)
                                        ->unique(ignoreRecord: true),
                                    Forms\Components\RichEditor::make('content')
                                        ->label('Isi Artikel')
                                        ->required()
                                        ->fileAttachmentsDisk('public')
                                        ->fileAttachmentsDirectory('articles/attachments')
                                        ->columnSpanFull(),
                                ]),
                        ])->columnSpan(2),

                        Forms\Components\Group::make([
                            Forms\Components\Section::make('Publikasi & Media')
                                ->schema([
                                    Forms\Components\Select::make('category_id')
                                        ->label('Kategori')
                                        ->relationship('category', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->createOptionForm([
                                            Forms\Components\TextInput::make('name')
                                                ->required()
                                                ->live(onBlur: true)
                                                ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                                            Forms\Components\TextInput::make('slug')
                                                ->required(),
                                        ]),
                                    Forms\Components\FileUpload::make('image')
                                        ->label('Foto Sampul')
                                        ->image()
                                        ->disk('public')
                                        ->directory('articles')
                                        ->imageEditor(),
                                    Forms\Components\Toggle::make('is_published')
                                        ->label('Publikasikan')
                                        ->default(true),
                                    Forms\Components\DateTimePicker::make('published_at')
                                        ->label('Waktu Publikasi')
                                        ->default(now()),
                                ]),
                        ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Sampul')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->sortable()
                    ->placeholder('Tanpa Kategori'),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Status Terbit'),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Rilis')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
