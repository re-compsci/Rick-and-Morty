<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PostsResource\Pages;
use App\Models\Posts;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
//use Filament\User\Resources\TextInput;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;//
use Filament\Forms\Components\FileUpload;


class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;
    protected static ?string $navigationLabel = 'Posts';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $modelLabel = 'Post';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make()->schema([         
            TextInput::make('char')->label('Character Name'),
            TextInput::make('post description'),   
            Checkbox::make('earth')->label('On Earth'), 
            Select::make('type')->options([
            'human' => 'Human',
            'alien' => 'Alien',
            'animal'=> 'Animal',
            'robot'=>'Robot',
            'other'=>'Other'])->native(false) ,

            FileUpload::make('post')->required()->image()->imageEditor(),

        ]) 
            
]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                              
                Tables\Columns\ImageColumn::make('post')->size(100)->grow(false),
                
                Tables\Columns\TextColumn::make('user.name')->label('Author'),
                Tables\Columns\TextColumn::make('char')->label('Character Name'), 
                // ...
                
                Tables\Columns\TextColumn::make('post description'),
                //
            ])
            ->filters([
                SelectFilter::make('earth')->options([1 => 'On Earth', 0 => 'Not On Earth'])
               
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
