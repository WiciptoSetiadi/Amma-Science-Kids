<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducatorResource\Pages;
use App\Models\Educator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EducatorResource extends Resource
{
    protected static ?string $model = Educator::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $modelLabel = 'Edukator';

    protected static ?string $pluralModelLabel = 'Tim Edukator';

    protected static ?string $navigationGroup = 'Manajemen Konten';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profil Edukator')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('role')
                            ->label('Jabatan atau Peran')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('bio')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Foto Edukator')
                            ->image()
                            ->disk('public')
                            ->directory('educators')
                            ->imageEditor(),
                        Forms\Components\ColorPicker::make('accent_color')
                            ->label('Warna Aksen')
                            ->default('#013bda'),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->default(0)
                            ->required(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Halaman Tentang')
                            ->default(true),
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
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('role')
                    ->label('Peran')
                    ->searchable()
                    ->placeholder('Belum diisi'),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Ditampilkan'),
            ])
            ->defaultSort('sort_order')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEducators::route('/'),
            'create' => Pages\CreateEducator::route('/create'),
            'edit' => Pages\EditEducator::route('/{record}/edit'),
        ];
    }
}
