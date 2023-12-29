<?php

namespace App\Filament\Resources\CommentsResource\Pages;

use App\Filament\Resources\CommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComments extends CreateRecord
{
   protected static string $resource = CommentsResource::class;
   protected function UserComment(array $data): array
   {
       $data['user_id'] = auth()->id();
       $data['post_id'] =  $this->post_id; 
    
       return $data;
   }
 

}
