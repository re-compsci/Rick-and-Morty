<?php

namespace App\Filament\User\Resources\PostsResource\Pages;

use App\Filament\User\Resources\PostsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePosts extends CreateRecord
{
    protected static string $resource = PostsResource::class;
}
