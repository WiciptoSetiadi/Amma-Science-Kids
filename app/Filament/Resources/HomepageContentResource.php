<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageContentResource\Pages;
use App\Models\HomepageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HomepageContentResource extends Resource
{
    protected static ?string $model = HomepageContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $modelLabel = 'Konten Beranda';

    protected static ?string $pluralModelLabel = 'Konten Beranda';

    protected static ?string $navigationGroup = 'Konten Beranda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pilihan Konten Beranda')
                    ->description('Pilih artikel dan maksimal dua program yang akan tampil di Beranda. Jika belum disimpan, konten terbaru tetap ditampilkan.')
                    ->schema([
                        Forms\Components\Select::make('featured_article_id')
                            ->label('Artikel Pilihan')
                            ->relationship('featuredArticle', 'title')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Hanya artikel yang sudah dipublikasikan yang tampil di Beranda.'),
                        Forms\Components\Select::make('featured_program_one_id')
                            ->label('Program Unggulan 1')
                            ->relationship('featuredProgramOne', 'title')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->different('featured_program_two_id')
                            ->helperText('Hanya program aktif yang tampil di Beranda.'),
                        Forms\Components\Select::make('featured_program_two_id')
                            ->label('Program Unggulan 2')
                            ->relationship('featuredProgramTwo', 'title')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->different('featured_program_one_id')
                            ->helperText('Hanya program aktif yang tampil di Beranda.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('featuredArticle.title')
                    ->label('Artikel Pilihan')
                    ->placeholder('Belum dipilih'),
                Tables\Columns\TextColumn::make('featuredProgramOne.title')
                    ->label('Program 1')
                    ->placeholder('Belum dipilih'),
                Tables\Columns\TextColumn::make('featuredProgramTwo.title')
                    ->label('Program 2')
                    ->placeholder('Belum dipilih'),
                Tables\Columns\IconColumn::make('is_configured')
                    ->label('Pengaturan')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-clock')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->tooltip(fn (HomepageContent $record): string => $record->is_configured
                        ? 'Pilihan admin sedang digunakan'
                        : 'Konten terbaru masih digunakan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageContents::route('/'),
            'edit' => Pages\EditHomepageContent::route('/{record}/edit'),
        ];
    }
}
