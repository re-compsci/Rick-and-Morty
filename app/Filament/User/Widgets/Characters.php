<?php

namespace App\Filament\User\Widgets;

use App\Models\Comments;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Posts;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
class Characters extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
            Posts::query()
            )
            ->columns([
                Stack::make([
                Tables\Columns\ImageColumn::make('post')->size(100)->grow(false),
                Tables\Columns\TextColumn::make('char')->label('Character Name'), 
                Tables\Columns\TextColumn::make('post description'),
                ])
                // ...
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])

            ->actions([
                Tables\Actions\CreateAction::make('COMMENT')->label('comment')->icon('heroicon-m-chat-bubble-bottom-center-text')
                ->iconButton()//button()
                ->model(Comments::class )->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();
                  return $data;
                })
                ->form([
                    TextInput::make('post_comment')->label('comment')
                        ->required()
                        ,
                    // ...
                ])

                ]);



    }
}
