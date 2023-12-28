<?php

namespace App\Filament\Resources\PostsResource\Pages;

use App\Filament\Resources\PostsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePosts extends CreateRecord
{
    protected static string $resource = PostsResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
     
        return $data;
    }
}
