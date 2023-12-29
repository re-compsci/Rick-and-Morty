<?php

namespace App\Filament\User\Resources\CommentsResource\Pages;

use App\Filament\User\Resources\CommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComments extends ListRecords
{
    protected static string $resource = CommentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
         //   Actions\CreateAction::make(),
        ];
    }
}
