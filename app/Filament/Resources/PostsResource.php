<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostsResource\Pages;
use App\Filament\Resources\PostsResource\RelationManagers;
use App\Models\Posts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components;
use Filament\Resources\Resource;
use Filament\Resources\IconColumn;
//use Filament\Resources\TextInput;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;


class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;
    protected static ?string $navigationLabel = 'Posts';
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $modelLabel = 'Post';
    protected static ?string $navigationGroup = 'Manage Content';

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
         
                ]),
             
                
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
             
                Tables\Columns\TextColumn::make('user.name')->label('Author'),
                Tables\Columns\TextColumn::make('char')->label('Character Name'), 
                Tables\Columns\TextColumn::make('post description') ,
                Tables\Columns\ImageColumn::make('post')->size(90),
                Tables\Columns\TextColumn::make('type')->badge()->color(fn (string $state): string => match ($state) {
        'robot' => 'gray',
        'alien' => 'warning',
        'human' => 'success',
        'animal' => 'info',
        'other' => 'danger',
    }),
             Tables\Columns\IconColumn::make('earth')->label('On Earth')->boolean(),
    ])
       
               
                //
           
            ->filters([
                ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
                
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

        ];
    }
}
