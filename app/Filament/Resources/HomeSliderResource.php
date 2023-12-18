<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeSliderResource\Pages;
use App\Filament\Resources\HomeSliderResource\RelationManagers;
use App\Models\HomeSlider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomeSliderResource extends Resource
{
    protected static ?string $model = HomeSlider::class;

    protected static ?string $modelLabel = 'Slider';
    protected static ?string $pluralModelLabel = 'Sliders';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Publicar';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Dados do Slider')
                    ->columns(5)
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columnSpan(2)
                            ->schema([
                                Forms\Components\FileUpload::make('image_url')
                                    ->required()
                                    ->label("Imagem")
                                    ->maxSize('2048')
                                    ->image()
                                    ->imageEditor()
                                    ->imageResizeTargetHeight('770')
                                    ->imageResizeTargetWidth('1800')
                                    ->helperText("Imagens proporcionais a 1800 X 770 px, Máximo 2 MB")
                                    ->columnSpan('full')
                                    ->directory('sliders')
                            ]),
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
                                    ->helperText("Ordem de exibição do slide")
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->label('Identificação')
                                    ->helperText("Não é exibido no site")
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('line')
                                    ->nullable()
                                    ->label('Título')
                                    ->helperText('Pequeno texto acima do destaque')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('title')
                                    ->nullable()
                                    ->label('Texto Destaque')
                                    ->helperText('Texto exibido no centro do slide')
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('button_text')
                                    ->nullable()
                                    ->label('Texto do botão')
                                    ->columnStart(1)
                                    ->columnSpan(1),
                                Forms\Components\TextInput::make('button_url')
                                    ->nullable()
                                    ->url()
                                    ->label('Link do botão')
                                    ->columnSpan(2)
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
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Imagem')
                    ->width('200px')
                    ->height('auto'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Identificação')
                    ->searchable()
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
            'index' => Pages\ListHomeSliders::route('/'),
            'create' => Pages\CreateHomeSlider::route('/create'),
            'edit' => Pages\EditHomeSlider::route('/{record}/edit'),
        ];
    }
}
