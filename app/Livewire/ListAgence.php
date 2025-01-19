<?php

namespace App\Livewire;

use App\Models\Agence;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListAgence extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Agence::query()->orderBy('created_at', 'desc'))
            // ->paginated(false)
            ->columns([
                TextColumn::make('nom')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('localisation')
                    ->label('Localisation')
                    ->searchable(),

            ])
            ->headerActions([
                Action::make('create')
                    ->label('Ajouter une agence')
                    ->button()
                    ->form([
                        TextInput::make('nom')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('localisation')
                            ->label('Localisation'),
                    ])
                    ->action(function (array $data) {
                        Agence::create($data);
                        Notification::make()
                            ->title('Succès')
                            ->body('Agence créé avec succès!')
                            ->success()
                            ->send();
                    })
            ])
            ->filters([])
            ->actions([
                DeleteAction::make()
                    ->label('Supprimer')
                    ->requiresConfirmation()
                    ->modalHeading('Confirmation de suppression')
                    ->modalSubheading('Êtes-vous sûr de vouloir supprimer cette agence ? Cette action est irréversible.')
                    ->successNotificationTitle('Agence supprimé avec succès.')
                    ->successNotificationTitle('Succès')
                    ->color('danger'),
            ])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.list-agence');
    }
}
