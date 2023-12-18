<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationsResource\Pages;
use App\Filament\Resources\LocationsResource\RelationManagers;
use App\Models\Locations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LocationsResource extends Resource
{
    protected static ?string $model = Locations::class;

    protected static ?string $modelLabel = 'Local de Mergulho';
    protected static ?string $pluralModelLabel = 'Locais de Mergulho';

    protected static ?string $navigationIcon = 'fas-person-swimming';

    protected static ?string $navigationGroup = 'Publicar';

    protected static ?int $navigationSort= 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(5)
                    ->columnSpan(3)
                    ->schema([
                        Forms\Components\Section::make('Dados do Local')
                            ->columnSpan('full')
                            ->columns(6)
                            ->schema([
                                Forms\Components\TextInput::make('city_name')
                                    ->label('Cidade')
                                    ->required()
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('latitude')
                                    ->label('Latitude')
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('longitude')
                                    ->label('Longitude')
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('title')
                                    ->label('Título')
                                    ->columnSpan(4),
                                Forms\Components\Textarea::make('short_description')
                                    ->label('Descrição curta')
                                    ->required()
                                    ->maxLength(300)
                                    ->columnSpan(4)
                            ]),
                        Forms\Components\Section::make('Descrição do Local')
                            ->columnSpan('full')
                            ->columns(6)
                            ->schema([
                                Forms\Components\Builder::make('long_description')
                                    ->label('Descrição do Local')
                                    ->columnSpan('full')
                                    ->minItems(1)
                                    ->schema([
                                        Forms\Components\Builder\Block::make('section')
                                            ->label('Sessão de Texto')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Título'),
                                                Forms\Components\RichEditor::make('content')
                                                    ->label('Conteúdo')
                                                    ->required()
                                            ]),
                                        Forms\Components\Builder\Block::make('gallery')
                                            ->label('Galeria de Fotos')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Título'),
                                                Forms\Components\Repeater::make('pictures')
                                                    ->label('Fotos')
                                                    ->reorderable(false)
                                                    ->schema([
                                                        Forms\Components\FileUpload::make('picture')
                                                            ->label('Imagem')
                                                            ->image()
                                                            ->imageEditor()
                                                            ->imageResizeTargetWidth('800')
                                                            ->imageResizeTargetHeight('600')
                                                            ->required()
                                                    ])
                                            ]),
                                        Forms\Components\Builder\Block::make('videos')
                                            ->label('Carrossel de Vídeos')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Título'),
                                                Forms\Components\Repeater::make('videos')
                                                    ->label('Vídeos')
                                                    ->reorderable(true)
                                                    ->schema([
                                                        Forms\Components\TextInput::make('video_url')
                                                            ->url()
                                                            ->label('URL do Youtube')
                                                    ])
                                            ]),
                                        Forms\Components\Builder\Block::make('button')
                                            ->label('Botão de Ação')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Título')
                                                    ->required(),
                                                Forms\Components\TextInput::make('url')
                                                    ->label('URL')
                                                    ->url()
                                                    ->required()
                                            ])
                                    ])
                            ])
                    ]),
                Forms\Components\Grid::make()
                    ->columnSpan(2)
                    ->schema([
                        Forms\Components\Section::make('Imagens')
                            ->columnSpan('full')
                            ->schema([
                                Forms\Components\FileUpload::make('small_image')
                                    ->label('Imagem Pequena')
                                    ->required()
                                    ->image()
                                    ->imageEditor()
                                    ->imageResizeTargetWidth('500')
                                    ->imageResizeTargetHeight('500')
                                    ->helperText('Imagens proporcionais a 500 x 500 px')
                                    ->directory('courses'),
                                Forms\Components\FileUpload::make('large_image')
                                    ->label('Imagem de Capa')
                                    ->required()
                                    ->image()
                                    ->imageEditor()
                                    ->imageResizeTargetWidth('1170')
                                    ->imageResizeTargetHeight('550')
                                    ->helperText('Imagens proporcionais a 1170 x 550 px')
                                    ->directory('courses')
                            ])
                    ])
            ])->columns(5);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city_name')
                    ->label('Cidade')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Titulo')
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocations::route('/create'),
            'edit' => Pages\EditLocations::route('/{record}/edit'),
        ];
    }
}
