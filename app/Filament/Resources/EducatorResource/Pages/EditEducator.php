<?php

namespace App\Filament\Resources\EducatorResource\Pages;

use App\Filament\Resources\EducatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducator extends EditRecord
{
    protected static string $resource = EducatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
