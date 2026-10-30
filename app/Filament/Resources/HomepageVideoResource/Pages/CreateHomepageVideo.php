<?php

namespace App\Filament\Resources\HomepageVideoResource\Pages;

use App\Filament\Resources\HomepageVideoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomepageVideo extends CreateRecord
{
    protected static string $resource = HomepageVideoResource::class;

    protected function getRedirectUrl(): string
    {
        return HomepageVideoResource::getUrl('index');
    }
}
