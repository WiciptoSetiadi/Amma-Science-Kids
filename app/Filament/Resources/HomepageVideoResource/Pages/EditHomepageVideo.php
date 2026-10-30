<?php

namespace App\Filament\Resources\HomepageVideoResource\Pages;

use App\Filament\Resources\HomepageVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomepageVideo extends EditRecord
{
    protected static string $resource = HomepageVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
