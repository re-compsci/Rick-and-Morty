<?php

namespace App\Filament\User\Resources\CommentsResource\Pages;

use App\Filament\User\Resources\CommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComments extends EditRecord
{
    protected static string $resource = CommentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
