<?php

namespace App\Filament\Resources\HomepageContentResource\Pages;

use App\Filament\Resources\HomepageContentResource;
use Filament\Resources\Pages\EditRecord;

class EditHomepageContent extends EditRecord
{
    protected static string $resource = HomepageContentResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['is_configured'] = true;

        return $data;
    }
}
