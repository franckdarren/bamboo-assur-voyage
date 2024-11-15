<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Tables\Table;
use App\Models\Souscription;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
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
                    ->label('Montant par Voyageur')
                    ->formatStateUsing(fn($record) => $record->montant_par_voyageur),

                TextColumn::make('cotation.voyageurs')
                    ->label('Voyageurs')
                    ->searchable(),

                TextColumn::make('statut')
                    ->badge()
                    ->sortable()
                    ->color(fn(?string $state): string => match ($state) {
                        'En attente de paiement' => 'warning',
                        'Payée' => 'success',
                    }),

                TextColumn::make('nom_prenom_souscripteur')
                    ->label('Souscripteur')
                    ->searchable(),

                TextColumn::make('phone_souscripteur')
                    ->label('Telephone souscripteur')
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
            ->filters([])
            ->actions([
                Action::make('marquerPayee')
                    ->label('Marquer comme payée')
                    ->action(fn(Souscription $record) => $record->update(['statut' => 'Payée']))
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn(Souscription $record) => $record->statut !== 'Payée'),
            ])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.list-souscription');
    }
}
