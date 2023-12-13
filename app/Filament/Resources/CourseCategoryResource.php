<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseCategoryResource\Pages;
use App\Filament\Resources\CourseCategoryResource\RelationManagers;
use App\Models\CourseCategory;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseCategoryResource extends Resource
{
    protected static ?string $model = CourseCategory::class;

    protected static ?string $modelLabel = "Categoria de Curso";
    protected static ?string $pluralModelLabel = "Categorias de Cursos";


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                ->columns(2)
                ->schema([
                    Forms\Components\Section::make('Dados do Slider')
                        ->columnSpan(1)
                        ->columns(5)
                        ->schema([
                            Forms\Components\Grid::make()
                                ->columnSpan(3)
                                ->columns(3)
                                ->schema([
                                    Forms\Components\TextInput::make('order')
                                        ->required()
                                        ->default(1)
                                        ->numeric()
                                        ->integer()
                                        ->minValue(1)
                                        ->step(1)
                                        ->label('Ordem')
                                        ->helperText("Ordem de exibição")
                                        ->columnSpan(2),
                                    Forms\Components\TextInput::make('title')
                                        ->required()
                                        ->label('Título')
                                        ->columnSpan(3),
                                    Forms\Components\Textarea::make('description')
                                        ->nullable()
                                        ->label('Descrição da categoria')
                                        ->maxLength(300)
                                        ->columnSpan(3)
                                ])

                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordem')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCourseCategories::route('/'),
            'create' => Pages\CreateCourseCategory::route('/create'),
            'edit' => Pages\EditCourseCategory::route('/{record}/edit'),
        ];
    }
}
