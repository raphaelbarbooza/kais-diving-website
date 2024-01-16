<?php

namespace App\Filament\Pages;

use App\Models\ShortOption;
use App\Services\ShortOptionsServices;
use Filament\Actions\Action;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;

class ContactInfo extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'fas-id-card';

    protected static ?string $navigationLabel = "Informações de Contato";

    protected static ?string $title = "Informações de Contato";

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.contact-info';

    public $data = [];

    public function mount(){
        // Load data from database
        $options['formData'] = ShortOptionsServices::getClass('contact');
        $this->form->fill($options);
    }

    public function form(Form $form) : Form
    {
        return $form
            ->schema([
                Section::make('Dados de Contato')
                    ->columnSpan(2)
                    ->columns(3)
                    ->schema([
                        TextInput::make('formData.main_email_address')
                            ->label("E-mail de contato")
                            ->email()
                            ->nullable()
                            ->columnSpan(2)
                            ->placeholder("exemplo@email.com.br"),
                        TextInput::make('formData.main_phone_number')
                            ->label("Telefone de contato")
                            ->nullable()
                            ->columnSpan(2)
                            ->placeholder("(00) 0000-0000"),
                        Textarea::make('formData.main_address')
                            ->label('Endereço')
                            ->nullable()
                            ->columnSpan('full')
                    ]),
                Section::make('Redes Sociais')
                    ->columnSpan(2)
                    ->columns(3)
                    ->schema([
                        TextInput::make('formData.social_facebook')
                        ->label('Link Facebook')
                        ->nullable()
                        ->url()
                        ->columnSpan(2),
                        TextInput::make('formData.social_twitter')
                            ->label('Link Twitter')
                            ->nullable()
                            ->url()
                            ->columnSpan(2),
                        TextInput::make('formData.social_youtube')
                            ->label('Link Youtube')
                            ->nullable()
                            ->url()
                            ->columnSpan(2),
                        TextInput::make('formData.social_instagram')
                            ->label('Link Instagram')
                            ->nullable()
                            ->url()
                            ->columnSpan(2),

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

    public function save(){
        // Save
        ShortOptionsServices::setClass('contact',$this->form->getState()['formData']);
        // Notify
        Notification::make()
            ->title("Dados salvos com sucesso.")
            ->success()
            ->send();
    }

}
