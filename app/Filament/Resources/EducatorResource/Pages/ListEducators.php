<?php

namespace App\Filament\Resources\EducatorResource\Pages;

use App\Filament\Resources\EducatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducators extends ListRecords
{
    protected static string $resource = EducatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
