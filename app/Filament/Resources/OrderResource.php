<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $modelLabel = 'Pesanan';

    protected static ?string $pluralModelLabel = 'Daftar Pesanan';

    protected static ?string $navigationGroup = 'E-Commerce';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $pendingCount = static::getModel()::where('status', 'menunggu_pembayaran')->count();

        return $pendingCount > 0 ? (string) $pendingCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pesanan')
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->label('No. Invoice')
                            ->disabled(),
                        Forms\Components\Select::make('status')
                            ->label('Status Pembayaran')
                            ->options([
                                'menunggu_pembayaran' => '⏳ Menunggu Pembayaran',
                                'sudah_bayar' => '✅ Sudah Bayar',
                                'dibatalkan' => '❌ Dibatalkan',
                            ])
                            ->required()
                            ->native(false),
                        Forms\Components\TextInput::make('customer_name')
                            ->label('Nama Pemesan')
                            ->disabled(),
                        Forms\Components\TextInput::make('customer_phone')
                            ->label('No. WhatsApp')
                            ->disabled(),
                        Forms\Components\TextInput::make('customer_email')
                            ->label('Email')
                            ->disabled(),
                        Forms\Components\TextInput::make('total_amount')
                            ->label('Total Pembayaran')
                            ->disabled()
                            ->prefix('Rp')
                            ->numeric(),
                    ])->columns(2),
                Forms\Components\Section::make('Catatan')
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan dari Pemesan')
                            ->disabled()
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('No. Invoice')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->copyable(),
                Tables\Columns\TextColumn::make('customer_name')
                    ->label('Nama Pemesan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer_phone')
                    ->label('WhatsApp')
                    ->copyable()
                    ->icon('heroicon-o-phone'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'menunggu_pembayaran' => '⏳ Menunggu Pembayaran',
                        'sudah_bayar' => '✅ Sudah Bayar',
                        'dibatalkan' => '❌ Dibatalkan',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pesan')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status Pembayaran')
                    ->options([
                        'menunggu_pembayaran' => 'Menunggu Pembayaran',
                        'sudah_bayar' => 'Sudah Bayar',
                        'dibatalkan' => 'Dibatalkan',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->label('Ubah Status'),
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
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
