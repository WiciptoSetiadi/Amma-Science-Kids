<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageVideoResource\Pages;
use App\Models\HomepageVideo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class HomepageVideoResource extends Resource
{
    protected static ?string $model = HomepageVideo::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $modelLabel = 'Video Beranda';

    protected static ?string $pluralModelLabel = 'Video Beranda';

    protected static ?string $navigationGroup = 'Konten Beranda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Video Beranda')
                    ->description('Video yang terakhir diperbarui akan ditampilkan di halaman beranda.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Video')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Nama ini digunakan sebagai nama file video yang disimpan.'),
                        Forms\Components\FileUpload::make('video_path')
                            ->label('File Video')
                            ->disk('public')
                            ->directory('homepage-videos')
                            ->acceptedFileTypes([
                                'video/mp4',
                                'video/webm',
                                'video/ogg',
                                'video/quicktime',
                            ])
                            ->extraAttributes([
                                'style' => 'width: min(100%, 240px);',
                            ])
                            ->panelAspectRatio('9:16')
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, Get $get): string {
                                $baseName = Str::slug((string) $get('name')) ?: 'video-beranda';
                                $extension = $file->guessExtension() ?: 'mp4';
                                $disk = Storage::disk('public');
                                $fileName = "{$baseName}.{$extension}";
                                $suffix = 2;

                                while ($disk->exists("homepage-videos/{$fileName}")) {
                                    $fileName = "{$baseName}-{$suffix}.{$extension}";
                                    $suffix++;
                                }

                                return $fileName;
                            })
                            ->maxSize(102400)
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('updated_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Video')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Tanpa nama'),
                Tables\Columns\TextColumn::make('video_path')
                    ->label('Nama File')
                    ->formatStateUsing(fn (string $state): string => basename($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageVideos::route('/'),
            'create' => Pages\CreateHomepageVideo::route('/create'),
            'edit' => Pages\EditHomepageVideo::route('/{record}/edit'),
        ];
    }
}
