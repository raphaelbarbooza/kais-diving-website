<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoursesResource\Pages;
use App\Filament\Resources\CoursesResource\RelationManagers;
use App\Models\Course;
use App\Models\Courses;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoursesResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $modelLabel = 'Curso';
    protected static ?string $pluralModelLabel = 'Cursos';

    protected static ?string $navigationIcon = 'fas-book-bookmark';

    protected static ?string $navigationGroup = 'Publicar';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(5)
                    ->columnSpan(3)
                    ->schema([
                        Forms\Components\Section::make('Dados do Curso')
                            ->columnSpan('full')
                            ->columns(6)
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->columnSpan('full')
                                    ->columns(3)
                                    ->schema([
                                        Forms\Components\Toggle::make('active')
                                            ->label('Curso Ativo')
                                            ->columnSpan(1),
                                        Forms\Components\Toggle::make('home_slider')
                                            ->label('Exibir no Slider')
                                            ->columnSpan(1),
                                        Forms\Components\Toggle::make('featured')
                                            ->label('Destaque na Home')
                                            ->columnSpan(1),
                                    ]),
                                Forms\Components\TextInput::make('order')
                                    ->label('Ordem de Exibição')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->minValue(1)
                                    ->step(1)
                                    ->integer()
                                    ->columnSpan(2)
                                    ->columnStart(1),
                                Forms\Components\TextInput::make('title')
                                    ->label('Título')
                                    ->required()
                                    ->columnSpan(4),
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'title')
                                    ->required()
                                    ->columnSpan(2),
                                Forms\Components\Textarea::make('short_description')
                                    ->label('Descrição curta')
                                    ->required()
                                    ->maxLength(300)
                                    ->columnSpan(4)
                            ]),
                        Forms\Components\Section::make('Descrição do Curso')
                            ->columnSpan('full')
                            ->columns(6)
                            ->schema([
                                Forms\Components\Builder::make('long_description')
                                    ->label('Descrição do Curso')
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
                                                            ->imageResizeTargetWidth('800px')
                                                            ->imageResizeTargetHeight('600px')
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
                                    ->imageResizeTargetWidth('500px')
                                    ->imageResizeTargetHeight('500px')
                                    ->helperText('Imagens proporcionais a 500 x 500 px')
                                    ->directory('courses'),
                                Forms\Components\FileUpload::make('large_image')
                                    ->label('Imagem de Capa')
                                    ->required()
                                    ->image()
                                    ->imageEditor()
                                    ->imageResizeTargetWidth('1170px')
                                    ->imageResizeTargetHeight('550px')
                                    ->helperText('Imagens proporcionais a 1170 x 550 px')
                                    ->directory('courses')
                            ]),
                        Forms\Components\Section::make('Detalhes')
                            ->columnSpan('full')
                            ->schema([
                                Forms\Components\Repeater::make('details')
                                    ->label('Detalhes')
                                    ->reorderable(false)
                                    ->maxItems(3)
                                    ->schema([
                                        Forms\Components\Textarea::make('title')
                                            ->label('Título')
                                            ->required(),
                                        Forms\Components\TextInput::make('value')
                                            ->label('Valor')
                                            ->required()
                                    ])
                            ])
                    ])
            ])->columns(5);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('active')
                    ->label('Ativo'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordem')
                    ->sortable()
                    ->numeric(),
                Tables\Columns\TextColumn::make('category.title')
                    ->label('Categoria')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourses::route('/create'),
            'edit' => Pages\EditCourses::route('/{record}/edit'),
        ];
    }
}
