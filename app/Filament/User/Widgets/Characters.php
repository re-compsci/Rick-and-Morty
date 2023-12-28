<?php

namespace App\Filament\User\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Posts;
use Filament\Tables\Columns\Layout\Stack;
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
                Tables\Columns\TextColumn::make('user.name')->label('Author'), 
                Tables\Columns\TextColumn::make('post description'),
                ])
                // ...
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ]);

    }
}
