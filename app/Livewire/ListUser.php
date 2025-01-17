<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Agence;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListUser extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->orderBy('created_at', 'desc'))
            // ->paginated(false)
            ->columns([
                TextColumn::make('name')
                    ->label('Identité')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('agence.nom')
                    ->label('Agence')
                    ->searchable(),

            ])
            ->headerActions([
                Action::make('create')
                    ->label('Ajouter un utilisateur')
                    ->button()
                    ->form([
                        TextInput::make('name')
                            ->label('Nom(s) et prénom(s)')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email'),
                        TextInput::make('password')
                            ->label('Mot de passe')
                            ->password()
                            ->required()
                            ->minLength(8)
                            ->maxLength(255),

                        Select::make('agence_id')
                            ->label('Agence')
                            ->options(Agence::all()->pluck('nom', 'id'))
                            ->searchable()
                            ->placeholder('Sélectionnez une agence')
                            ->required()
                    ])
                    ->action(function (array $data) {
                        User::create($data);
                        Notification::make()
                            ->title('Succès')
                            ->body('Utilisateur créé avec succès!')
                            ->success()
                            ->send();
                    })
            ])
            ->filters([
                \Filament\Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                // DeleteAction::make()
                //     ->label('Supprimer')
                //     ->requiresConfirmation()
                //     ->modalHeading('Confirmation de suppression')
                //     ->modalSubheading('Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.')
                //     ->successNotificationTitle('Utilisateur supprimé avec succès.')
                //     ->successNotificationTitle('Succès')
                //     ->color('danger'),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.list-user');
    }
}
