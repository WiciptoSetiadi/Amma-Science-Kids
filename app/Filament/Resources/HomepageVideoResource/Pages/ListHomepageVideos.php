<?php

namespace App\Filament\Resources\HomepageVideoResource\Pages;

use App\Filament\Resources\HomepageVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomepageVideos extends ListRecords
{
    protected static string $resource = HomepageVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
