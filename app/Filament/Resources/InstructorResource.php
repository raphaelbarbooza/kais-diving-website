<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstructorResource\Pages;
use App\Filament\Resources\InstructorResource\RelationManagers;
use App\Models\Instructor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstructorResource extends Resource
{
    protected static ?string $model = Instructor::class;

    protected static ?string $label = "Instrutor";
    protected static ?string $pluralModelLabel = "Instrutores";
    protected static ?string $navigationIcon = 'heroicon-s-user';

    protected static ?string $navigationGroup = "Website";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label("Nome")
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label("Imagem")
                    ->required()
                    ->maxSize('2048')
                    ->image()
                    ->imageEditor()
                    ->helperText("Imagens proporcionais a 270 x 295 px, Máximo 2 MB")
                    ->columnSpan('full')
                    ->directory('instructors')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('54:59')
                    ->imageResizeTargetWidth('270')
                    ->imageResizeTargetHeight('295'),
                Forms\Components\Fieldset::make("Redes Sociais")
                    ->schema([
                        Forms\Components\TextInput::make('social_links.instagram')
                            ->label("Instagram")
                            ->url()
                            ->nullable(),
                        Forms\Components\TextInput::make('social_links.facebook')
                            ->label("Facebook")
                            ->url()
                            ->nullable(),
                        Forms\Components\TextInput::make('social_links.twitter')
                            ->label("Twitter")
                            ->url()
                            ->nullable(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->width(120)
                    ->height('auto')
                    ->label('Imagem'),
                Tables\Columns\TextColumn::make('name')
                    ->label("Nome")
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListInstructors::route('/'),
            'create' => Pages\CreateInstructor::route('/create'),
            'edit' => Pages\EditInstructor::route('/{record}/edit'),
        ];
    }
}
