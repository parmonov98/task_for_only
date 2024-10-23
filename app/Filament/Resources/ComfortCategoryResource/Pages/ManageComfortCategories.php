<?php

namespace App\Filament\Resources\ComfortCategoryResource\Pages;

use App\Filament\Resources\ComfortCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageComfortCategories extends ManageRecords
{
    protected static string $resource = ComfortCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
