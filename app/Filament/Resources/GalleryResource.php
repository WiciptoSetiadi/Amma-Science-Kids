<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $modelLabel = 'Foto Galeri';

    protected static ?string $pluralModelLabel = 'Galeri Kegiatan';

    protected static ?string $navigationGroup = 'Media & Kegiatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Foto Kegiatan')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Foto / Kegiatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category')
                            ->label('Kategori Kegiatan')
                            ->options([
                                'Eksperimen' => 'Eksperimen',
                                'Workshop' => 'Workshop',
                                'Family Learning' => 'Family Learning',
                                'Event Festival' => 'Event Festival',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->default('Eksperimen')
                            ->required(),
                        Forms\Components\FileUpload::make('image')
                            ->label('File Foto')
                            ->image()
                            ->disk('public')
                            ->directory('gallery')
                            ->imageEditor()
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Keterangan / Cerita Foto')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Kegiatan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Eksperimen' => 'success',
                        'Workshop' => 'warning',
                        'Family Learning' => 'info',
                        'Event Festival' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Unggah')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Eksperimen' => 'Eksperimen',
                        'Workshop' => 'Workshop',
                        'Family Learning' => 'Family Learning',
                        'Event Festival' => 'Event Festival',
                        'Lainnya' => 'Lainnya',
                    ]),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
