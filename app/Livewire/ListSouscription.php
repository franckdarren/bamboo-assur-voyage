<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Tables\Table;
use App\Models\Souscription;
use Filament\Actions\StaticAction;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\BonPeseeExporter;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Tables\Concerns\InteractsWithTable;

class ListSouscription extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Souscription::query()->orderBy('created_at', 'desc'))
            // ->paginated(false)
            ->columns([
                TextColumn::make('nom_prenom_assure')
                    ->label('Identité')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date_naissance_assure')
                    ->label('Date de naissance')
                    ->date('d-m-Y')
                    ->searchable(),

                TextColumn::make('adresse_assure')
                    ->label('Adresse')
                    ->searchable(),

                TextColumn::make('phone_assure')
                    ->label('Telephone')
                    ->searchable(),

                TextColumn::make('email_assure')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('passeport_assure')
                    ->label('Passeport')
                    ->searchable(),

                ImageColumn::make('url_passeport_assure')
                    ->label('Image'),


                TextColumn::make('cotation.destination')
                    ->label('Destination')
                    ->searchable(),

                TextColumn::make('cotation.depart')
                    ->label('Départ')
                    ->searchable(),

                TextColumn::make('cotation.retour')
                    ->label('Retour')
                    ->searchable(),

                TextColumn::make('cotation.nombre_jours')
                    ->label('Durée')
                    ->formatStateUsing(fn($state) => $state . ' jours')
                    ->searchable(),

                TextColumn::make('montant_par_voyageur')
                    ->label('Montant')
                    ->formatStateUsing(fn($record) => $record->montant_par_voyageur),

                TextColumn::make('cotation.voyageurs')
                    ->label('Voyageurs')
                    ->searchable(),

                TextColumn::make('statut')
                    ->badge()
                    ->sortable()
                    ->color(fn(?string $state): string => match ($state) {
                        'En attente de paiement' => 'warning',
                        'En cours de traitement' => 'gray',
                        'Payée' => 'success',
                    }),

                TextColumn::make('nom_prenom_souscripteur')
                    ->label('Souscripteur')
                    ->searchable(),

                TextColumn::make('phone_souscripteur')
                    ->label('Telephone souscripteur')
                    ->searchable(),

                TextColumn::make('mode_paiement')
                    ->label('Mode paiement')
                    ->badge()
                    ->color(fn(?string $state): string => match ($state) {
                        'En agence' => 'warning',
                        'En ligne' => 'gray',
                    })
                    ->searchable(),

                TextColumn::make('rendezvous.date_rdv')
                    ->label('Date RDV')
                    ->searchable(),

                TextColumn::make('rendezvous.heure_rdv')
                    ->label('Heure RDV')
                    ->searchable(),

                TextColumn::make('rendezvous.agence')
                    ->label('Agence')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime('d-m-Y à H\hi')
                    ->dateTimeTooltip()
                    ->label("Date création"),
            ])
            ->groups([
                Group::make('nom_prenom_souscripteur')
                    ->label('Souscripteur'),
            ])

            ->groupingDirectionSettingHidden()
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('statut')
                    ->label('Statut')
                    ->options([
                        'En attente de paiement' => 'En attente de paiement',
                        'En cours de traitement' => 'En cours de traitement',
                        'Payée' => 'Payée',
                    ]),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('marquerPayee')
                        ->label('Marquer comme payée')
                        ->action(fn(Souscription $record) => $record->update(['statut' => 'Payée']))
                        ->requiresConfirmation()
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->visible(fn(Souscription $record) => $record->statut !== 'Payée'),

                    //Affichage du passport
                    Action::make('url_passeport_assure')
                        ->label('Voir le passport')
                        ->modalContent(fn(Souscription $record) => new HtmlString(
                            '<iframe src="' . Storage::disk('public')->url($record->url_passeport_assure) . '" width="100%" height="600px"></iframe>'
                        ))
                        ->modalWidth('7xl')
                        ->requiresConfirmation(false)
                        ->modalSubmitAction(false)
                        ->modalFooterActionsAlignment('right')
                        ->modalCancelAction(fn(StaticAction $action) => $action),

                    // Bouton personnalisé "Modifier"
                    Action::make('modifier')
                        ->label('Modifier')
                        // ->icon('heroicon-o-pencil')
                        ->action(function (Souscription $record, array $data): void {
                            $record->update($data); // Met à jour l'enregistrement
                        })
                        ->form(function (Souscription $record) {
                            return [
                                Grid::make(2) // Deux colonnes
                                    ->schema([
                                        TextInput::make('nom_prenom_assure')
                                            ->required()
                                            ->default(fn() => $record->nom_prenom_assure),

                                        TextInput::make('date_naissance_assure')
                                            ->required()
                                            ->default(fn() => $record->date_naissance_assure),

                                        TextInput::make('adresse_assure')
                                            ->label('Adresse')
                                            ->required()
                                            ->default(fn() => $record->adresse_assure),

                                        TextInput::make('phone_assure')
                                            ->label('Phone')
                                            ->required()
                                            ->default(fn() => $record->phone_assure),

                                        TextInput::make('email_assure')
                                            ->email()
                                            ->required()
                                            ->default(fn() => $record->email_assure),

                                        TextInput::make('passeport_assure')
                                            ->required()
                                            ->default(fn() => $record->passeport_assure),

                                        FileUpload::make('url_passeport_assure')
                                            ->label('Image passport')
                                            ->visibility('public')
                                            ->default(fn() => $record->url_passeport_assure),

                                        // TextInput::make('cotation.destination')
                                        //     ->required()
                                        //     ->default(fn() => $record->cotation?->destination),

                                        // TextInput::make('cotation.depart')
                                        //     ->required()
                                        //     ->default(fn() => $record->cotation?->depart),

                                        // TextInput::make('cotation.retour')
                                        //     ->required()
                                        //     ->default(fn() => $record->cotation?->retour),

                                        // TextInput::make('cotation.nombre_jours')
                                        //     ->required()
                                        //     ->default(fn() => $record->cotation?->nombre_jours),

                                        // TextInput::make('montant_par_voyageur')
                                        //     ->required()
                                        //     ->default(fn() => $record->montant_par_voyageur),

                                        // TextInput::make('cotation.voyageurs')
                                        //     ->required()
                                        //     ->default(fn() => $record->cotation?->voyageurs),

                                        // TextInput::make('nom_prenom_souscripteur')
                                        //     ->required()
                                        //     ->default(fn() => $record->nom_prenom_souscripteur),

                                        // TextInput::make('phone_souscripteur')
                                        //     ->required()
                                        //     ->default(fn() => $record->phone_souscripteur),

                                        // TextInput::make('rendezvous.date_rdv')
                                        //     ->required()
                                        //     ->default(fn() => $record->rendezvous?->date_rdv),

                                        // TextInput::make('rendezvous.heure_rdv')
                                        //     ->required()
                                        //     ->default(fn() => $record->rendezvous?->heure_rdv),

                                        // TextInput::make('rendezvous.agence')
                                        //     ->required()
                                        //     ->default(fn() => $record->rendezvous?->agence),
                                    ]),

                            ];
                        }),
                ])->label('Action')
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
                    ->color('primary')


            ])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.list-souscription');
    }
}
