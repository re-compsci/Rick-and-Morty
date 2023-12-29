<?php

namespace App\Filament\User\Resources\CommentsResource\Pages;

use App\Filament\User\Resources\CommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComments extends CreateRecord
{
    protected static string $resource = CommentsResource::class;
}
