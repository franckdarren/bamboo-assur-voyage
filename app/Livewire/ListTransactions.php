<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Tables\Table;
use App\Models\Transaction;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListTransactions extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Transaction::query()->orderBy('created_at', 'desc'))
            // ->paginated(false)
            ->columns([
                TextColumn::make('reference')
                    ->label('Reférence')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('customer_name')
                    ->label('Nom')
                    ->searchable(),

                TextColumn::make('customer_email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('amount')
                    ->label('Montant transaction')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => number_format($state, 0, '', ' ') . ' FCFA'),

                TextColumn::make('status')
                    ->label('Statuts')
                    ->searchable(),

                TextColumn::make('paid_at')
                    ->label('Date')
                    ->searchable(),

                TextColumn::make('operator')
                    ->label('Opérateur')
                    ->searchable(),

                TextColumn::make('transaction_id')
                    ->label('Identifiant')
                    ->searchable(),

                    TextColumn::make('customer_msisdn')
                    ->label('Msisdn')
                    ->searchable(),

                    TextColumn::make('cotation.destination')
                    ->label('Destination')
                    ->searchable(),

                    TextColumn::make('cotation.voyageurs')
                    ->label('Voyageur(s)')
                    ->searchable(),

                    TextColumn::make('cotation.depart')
                    ->label('Départ')
                    ->searchable(),

                    TextColumn::make('cotation.retour')
                    ->label('Retour')
                    ->searchable(),

                    TextColumn::make('cotation.nombre_jours')
                    ->label('Nombre de jours')
                    ->searchable(),

                    TextColumn::make('cotation.montant')
                    ->label('Montant')
                    ->formatStateUsing(fn ($state) => number_format($state, 0, '', ' ') . ' FCFA')
                    ->searchable(),

            ])

            ->filters([

            ])
            ->actions([

            ])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.list-transactions');
    }
}
