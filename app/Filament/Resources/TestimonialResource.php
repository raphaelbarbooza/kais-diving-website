<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $modelLabel = "Depoimento";
    protected static ?string $pluralModelLabel = "Depoimentos";

    protected static ?string $navigationIcon = 'far-comment';

    protected static ?string $navigationGroup = 'Publicações';

    protected static ?int $navigationSort = 4;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Dados do Depoimento')
                    ->columnSpan(1)
                    ->columns(4)
                    ->schema([
                        Forms\Components\TextInput::make('order')
                            ->required()
                            ->numeric()
                            ->integer()
                            ->label('Ordem')
                            ->minValue(1)
                            ->step(1)
                            ->default(1)
                            ->columnSpan(1),
                        Forms\Components\FileUpload::make('client_image')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetHeight(200)
                            ->imageResizeTargetWidth(200)
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('200')
                            ->imageResizeTargetHeight('200')
                            ->label('Imagem do Cliente')
                            ->directory('testimonial')
                            ->columnSpan(3),
                        Forms\Components\TextInput::make('client_name')
                            ->required()
                            ->label('Nome')
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('client_position')
                            ->required()
                            ->label('Cargo')
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('text')
                            ->required()
                            ->maxLength(150)
                            ->label('Depoimento')
                            ->columnSpan('full')
                    ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordem')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('client_image')
                    ->circular()
                    ->height('80px')
                    ->width('auto')
                    ->label('Imagem'),
                Tables\Columns\TextColumn::make('client_name')
                    ->label('Nome'),
                Tables\Columns\TextColumn::make('client_position')
                    ->label('Cargo')
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
