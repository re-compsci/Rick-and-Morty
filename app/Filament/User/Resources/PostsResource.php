<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PostsResource\Pages;
use App\Filament\User\Resources\PostsResource\RelationManagers;
use App\Models\Posts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;
    protected static ?string $navigationLabel = 'Posts';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $modelLabel = ' New Post';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([               
                Tables\Columns\ImageColumn::make('post')->size(100)->grow(false),
                Tables\Columns\TextColumn::make('user.name')->label('Author'), 
                Tables\Columns\TextColumn::make('post description'),
                //
            ]),])
            ->filters([
                SelectFilter::make('earth')->options([1 => 'published', 0 => 'Draft'])
               
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
    // ...
])

            
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);


    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePosts::route('/create'),
            'edit' => Pages\EditPosts::route('/{record}/edit'),
        ];
    }
}
