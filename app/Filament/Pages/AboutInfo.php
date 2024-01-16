<?php

namespace App\Filament\Pages;

use App\Models\ShortOption;
use App\Services\ShortOptionsServices;
use Filament\Actions\Action;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;

class AboutInfo extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationLabel = "Sobre a Empresa";

    protected static ?string $title = "Sobre a Empresa";

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.about-info';

    public $data = [];

    public function mount()
    {
        // Load data from database
        $options['formData'] = ShortOptionsServices::getClass('about');
        $this->form->fill($options);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Home - Resumo Sobre')
                    ->description("A imagem, e o contador de anos de experiência são automáticos")
                    ->schema([
                        TextInput::make('formData.home.title')
                            ->label("Título")
                            ->required(),
                        RichEditor::make('formData.home.content')
                            ->label("Conteúdo")
                            ->required(),
                    ]),
                Section::make('Sobre - Sessão 01')
                    ->description("Primeira sessão de conteúdo. Essa sessão é obrigatória.")
                    ->schema([
                        TextInput::make('formData.sect01.title')
                            ->label("Título")
                            ->required(),
                        RichEditor::make('formData.sect01.content')
                            ->label("Conteúdo")
                            ->required(),
                    ]),
                Section::make('Sobre - Sessão 02')
                    ->schema([
                        Toggle::make('formData.sect02.show')
                            ->label("Exibir"),
                        TextInput::make('formData.sect02.title')
                            ->label("Título"),
                        RichEditor::make('formData.sect02.content')
                            ->label("Conteúdo"),
                        FileUpload::make('formData.sect02.image')
                            ->label("Imagem")
                            ->maxSize('2048')
                            ->image()
                            ->imageEditor()
                            ->imageResizeTargetHeight('840')
                            ->imageResizeTargetWidth('1000')
                            ->helperText("Imagens proporcionais a 1000 X 840 px, Máximo 2 MB")
                            ->columnSpan('full')
                            ->directory('about')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('25:21')
                            ->imageResizeTargetWidth('1000')
                            ->imageResizeTargetHeight('840')
                    ]),
                Section::make('Sobre - Sessão 03')
                    ->schema([
                        Toggle::make('formData.sect03.show')
                            ->label("Exibir"),
                        TextInput::make('formData.sect03.title')
                            ->label("Título"),
                        RichEditor::make('formData.sect03.content')
                            ->label("Conteúdo"),
                        FileUpload::make('formData.sect03.image')
                            ->label("Imagem")
                            ->maxSize('2048')
                            ->image()
                            ->imageEditor()
                            ->imageResizeTargetHeight('840')
                            ->imageResizeTargetWidth('1000')
                            ->helperText("Imagens proporcionais a 1000 X 840 px, Máximo 2 MB")
                            ->columnSpan('full')
                            ->directory('about')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('25:21')
                            ->imageResizeTargetWidth('1000')
                            ->imageResizeTargetHeight('840')
                    ]),
                Section::make('Sobre - Chamada de Ação')
                    ->description("Essa chamada de ação exibe um vídeo ao ser clicada.")
                    ->schema([
                        Toggle::make('formData.call.show')
                            ->label("Exibir"),
                        TextInput::make('formData.call.title')
                            ->label("Título")
                            ->requiredWith('formData.call.show'),
                        TextInput::make('formData.call.url')
                            ->label("URL do Youtube")
                            ->requiredWith('formData.call.show')
                    ]),
                Actions::make([
                    Actions\Action::make('submit')
                        ->label('Salvar Alterações')
                        ->submit(true)
                ])
            ])
            ->columns(4)
            ->statePath('data');
    }

    public function save()
    {
        // Save
        ShortOptionsServices::setClass('about', $this->form->getState()['formData']);
        // Notify
        Notification::make()
            ->title("Dados salvos com sucesso.")
            ->success()
            ->send();
    }

}
