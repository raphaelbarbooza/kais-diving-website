<?php

namespace App\Filament\Pages;

use App\Services\ShortOptionsServices;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class FunFacts extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'fas-arrow-up-9-1';

    protected static ?string $navigationLabel = "Contador Dados";

    protected static ?string $title = "Contador Dados";
    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 6;

    protected static string $view = 'filament.pages.fun-facts';

    public $data = [];

    public function mount(){
        // Load data from database
        $options['formData'] = ShortOptionsServices::getClass('facts');
        $this->form->fill($options);
    }

    public function form(Form $form) : Form
    {
        return $form
            ->schema([
                Section::make('Contadores')
                    ->columnSpan(2)
                    ->columns(3)
                    ->schema([
                        Repeater::make('formData.counter')
                            ->label('contadores')
                            ->hiddenLabel()
                            ->columns(2)
                            ->columnSpan('full')
                            ->schema([
                                Textarea::make('formData.counter.title')
                                    ->label("Título")
                                    ->required()
                                    ->columnSpan(1),
                                TextInput::make('formData.counter.value')
                                    ->label('Valor')
                                    ->numeric()
                                    ->minValue(1)
                                    ->step(1)
                                    ->required()
                                    ->columnSpan(1)
                            ])
                            ->minItems(1)
                            ->maxItems(4),
                    ]),
                Actions::make([
                    Actions\Action::make('submit')
                        ->label('Salvar Alterações')
                        ->submit(true)
                ])->columnStart(1)
            ])
            ->columns(4)
            ->statePath('data');
    }

    public function save(){
        // Save
        ShortOptionsServices::setClass('facts',$this->form->getState()['formData']);
        // Notify
        Notification::make()
            ->title("Dados salvos com sucesso.")
            ->success()
            ->send();
    }

}
